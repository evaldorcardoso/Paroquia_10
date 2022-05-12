import {
  Controller,
  Get,
  Post,
  Body,
  Patch,
  Param,
  Delete,
  UseGuards,
  ValidationPipe,
  Put,
} from '@nestjs/common';
import { AuthGuard } from '@nestjs/passport';
import { GetUser } from 'src/auth/get-user.decorator';
import { User } from 'src/user/user.entity';
import { CongregationsService } from './congregations.service';
import { CreateCongregationDto } from './dto/create-congregation.dto';
import { UpdateCongregationDto } from './dto/update-congregation.dto';

@Controller('api/congregations')
export class CongregationsController {
  constructor(private readonly congregationsService: CongregationsService) {}

  @Get('public')
  findAll() {
    return this.congregationsService.findAll();
  }

  @Get('public/:uuid')
  async findOne(@Param('uuid') uuid: string) {
    return await this.congregationsService.findOne(uuid);
  }

  @Post()
  @UseGuards(AuthGuard('jwt'))
  async create(
    @Body(ValidationPipe) createCongregationDto: CreateCongregationDto,
    @GetUser() user: User,
  ) {
    return await this.congregationsService.create(user, createCongregationDto);
  }

  @Put(':uuid')
  @UseGuards(AuthGuard('jwt'))
  async update(
    @Param('uuid') uuid: string,
    @GetUser() user: User,
    @Body() updateCongregationDto: UpdateCongregationDto,
  ) {
    return await this.congregationsService.update(
      user,
      uuid,
      updateCongregationDto,
    );
  }

  @Delete(':uuid')
  @UseGuards(AuthGuard('jwt'))
  async remove(@Param('uuid') uuid: string, @GetUser() user: User) {
    return await this.congregationsService.remove(user, uuid);
  }
}
