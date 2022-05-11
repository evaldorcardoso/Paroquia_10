import { Test, TestingModule } from '@nestjs/testing';
import { CongregationsController } from './congregations.controller';
import { CongregationsService } from './congregations.service';

describe('CongregationsController', () => {
  let controller: CongregationsController;

  beforeEach(async () => {
    const module: TestingModule = await Test.createTestingModule({
      controllers: [CongregationsController],
      providers: [CongregationsService],
    }).compile();

    controller = module.get<CongregationsController>(CongregationsController);
  });

  it('should be defined', () => {
    expect(controller).toBeDefined();
  });
});
