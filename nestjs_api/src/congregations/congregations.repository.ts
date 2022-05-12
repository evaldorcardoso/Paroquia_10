import {
  ConflictException,
  InternalServerErrorException,
} from '@nestjs/common';
import { User } from 'src/user/user.entity';
import { EntityRepository, Repository } from 'typeorm';
import { Congregation } from './congregation.entity';
import { CreateCongregationDto } from './dto/create-congregation.dto';

@EntityRepository(Congregation)
export class CongregationRepository extends Repository<Congregation> {
  async createCongregation(
    user: User,
    createCongregationDto: CreateCongregationDto,
  ): Promise<Congregation> {
    const { name, description, address } = createCongregationDto;
    const congregation = new Congregation();
    congregation.name = name;
    congregation.description = description;
    congregation.address = address;
    congregation.has = [user];

    try {
      await congregation.save();
    } catch (error) {
      if (error.code === 'ER_DUP_ENTRY' || error.code === 'SQLITE_CONSTRAINT') {
        throw new ConflictException('Congregação já cadastrada');
      } else {
        throw new InternalServerErrorException(
          'Erro ao cadastrar Congregação no banco de dados' + error,
        );
      }
    }

    return congregation;
  }
}
