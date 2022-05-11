import { Module } from '@nestjs/common';
import { CongregationsService } from './congregations.service';
import { CongregationsController } from './congregations.controller';
import { CongregationRepository } from './congregations.repository';
import { TypeOrmModule } from '@nestjs/typeorm';

@Module({
  imports: [TypeOrmModule.forFeature([CongregationRepository])],
  controllers: [CongregationsController],
  providers: [CongregationsService],
})
export class CongregationsModule {}
