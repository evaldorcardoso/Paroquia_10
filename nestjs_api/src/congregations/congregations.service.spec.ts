import { Test, TestingModule } from '@nestjs/testing';
import { CongregationsService } from './congregations.service';

describe('CongregationsService', () => {
  let service: CongregationsService;

  beforeEach(async () => {
    const module: TestingModule = await Test.createTestingModule({
      providers: [CongregationsService],
    }).compile();

    service = module.get<CongregationsService>(CongregationsService);
  });

  it('should be defined', () => {
    expect(service).toBeDefined();
  });
});
