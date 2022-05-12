import {
  ForbiddenException,
  Injectable,
  NotFoundException,
} from '@nestjs/common';
import { InjectRepository } from '@nestjs/typeorm';
import { User } from 'src/user/user.entity';
import { CongregationRepository } from './congregations.repository';
import { CreateCongregationDto } from './dto/create-congregation.dto';
import { UpdateCongregationDto } from './dto/update-congregation.dto';

@Injectable()
export class CongregationsService {
  constructor(
    @InjectRepository(CongregationRepository)
    private readonly congregationRepository: CongregationRepository,
  ) {}
  async create(user: User, createCongregationDto: CreateCongregationDto) {
    return await this.congregationRepository.createCongregation(
      user,
      createCongregationDto,
    );
  }

  async findOne(uuid: string) {
    return await this.congregationRepository.findOne({ uuid });
  }

  async findAll() {
    return await this.congregationRepository.find();
  }

  async update(
    user: User,
    uuid: string,
    updateCongregationDto: UpdateCongregationDto,
  ) {
    if (!(await this.userHasCongregation(user, uuid))) {
      throw new ForbiddenException(
        'Este usuário não tem permissão para alterar esta congregação',
      );
    }

    const result = await this.congregationRepository.update(
      { uuid },
      updateCongregationDto,
    );
    if (result.affected === 0) {
      throw new NotFoundException('Congregação não encontrada');
    }
    const congregation = await this.congregationRepository.findOne({
      uuid,
    });
    return congregation;
  }

  async remove(user: User, uuid: string) {
    if (!(await this.userHasCongregation(user, uuid))) {
      throw new ForbiddenException(
        'Este usuário não tem permissão para remover esta congregação',
      );
    }

    const result = await this.congregationRepository.delete({ uuid });
    if (result.affected === 0) {
      throw new NotFoundException(
        `Congregação com uuid ${uuid} não encontrada`,
      );
    }
  }

  async userHasCongregation(user: User, uuid: string): Promise<boolean> {
    const query =
      this.congregationRepository.createQueryBuilder('congregation');

    query
      .innerJoin(
        'congregation_user',
        'congregation_user',
        'congregation.id = congregation_user.congregation_id',
      )
      .andWhere('congregation_user.user_id = :userId', {
        userId: user.id,
      })
      .andWhere('congregation.uuid = :uuid', { uuid });

    const userHasCongregation = await query.getOne();

    return !!userHasCongregation;
  }
}
