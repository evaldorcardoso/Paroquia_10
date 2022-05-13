import { Test, TestingModule } from '@nestjs/testing';
import { Congregation } from './congregation.entity';
import { CongregationRepository } from './congregations.repository';
import { CongregationsService } from './congregations.service';
import { faker } from '@faker-js/faker';
import { CreateCongregationDto } from './dto/create-congregation.dto';
import { User } from '../user/user.entity';
import { DeleteResult } from 'typeorm';
import { FindCongregationsQueryDto } from './dto/find-congregations-query.dto';

describe('CongregationsService', () => {
  let service: CongregationsService;
  let repository: CongregationRepository;

  beforeEach(async () => {
    const module: TestingModule = await Test.createTestingModule({
      providers: [
        CongregationsService,
        {
          provide: CongregationRepository,
          useValue: {
            createCongregation: jest.fn(),
            find: jest.fn(),
            findOne: jest.fn(),
            delete: jest.fn(),
          },
        },
      ],
    }).compile();

    service = module.get<CongregationsService>(CongregationsService);
    repository = module.get(CongregationRepository);
  });

  it('should be defined', () => {
    expect(service).toBeDefined();
  });

  it('should create a congregation', async () => {
    const congregationDto = new CreateCongregationDto();
    congregationDto.name = faker.datatype.string();
    congregationDto.address = faker.datatype.string();

    const resolvedCongregation = new Congregation();
    resolvedCongregation.uuid = faker.datatype.uuid();
    resolvedCongregation.id = faker.datatype.number();
    resolvedCongregation.name = congregationDto.name;
    resolvedCongregation.address = congregationDto.address;

    const user = new User();

    jest.spyOn(service, 'userHasCongregation').mockImplementationOnce(() => {
      return Promise.resolve(true);
    });

    jest
      .spyOn(repository, 'createCongregation')
      .mockResolvedValue(resolvedCongregation);

    const data = await service.create(user, congregationDto);

    expect(data).toEqual(resolvedCongregation);
  });

  it('should get a congregation by uuid', async () => {
    const congregation = new Congregation();
    congregation.uuid = faker.datatype.uuid();
    congregation.id = faker.datatype.number();
    congregation.name = faker.datatype.string();
    congregation.address = faker.datatype.string();

    jest.spyOn(repository, 'findOne').mockImplementation(() => {
      return Promise.resolve(congregation);
    });

    const data = await service.findOne(congregation.uuid);

    expect(data).toEqual(congregation);
  });

  it('should find congregations by queryString', async () => {
    const congregation = new Congregation();
    congregation.uuid = faker.datatype.uuid();
    congregation.id = faker.datatype.number();
    congregation.name = faker.datatype.string();
    congregation.address = faker.datatype.string();

    const resolvedCongregation = new Congregation();
    resolvedCongregation.uuid = faker.datatype.uuid();
    resolvedCongregation.id = faker.datatype.number();
    resolvedCongregation.name = congregation.name;
    resolvedCongregation.address = congregation.address;

    const queryDto = new FindCongregationsQueryDto();
    queryDto.name = faker.datatype.string();

    jest.spyOn(repository, 'find').mockResolvedValue([congregation]);

    const data = await service.findAll();

    expect(data).toEqual([congregation]);
  });

  it('should remove a congregation by uuid', async () => {
    const user = new User();

    jest.spyOn(service, 'userHasCongregation').mockImplementationOnce(() => {
      return Promise.resolve(true);
    });

    jest.spyOn(repository, 'delete').mockResolvedValue(new DeleteResult());

    await service.remove(user, faker.datatype.uuid());
  });
});
