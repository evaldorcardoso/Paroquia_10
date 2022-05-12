import { Controller, Get, Req, UseGuards } from '@nestjs/common';
import { AuthGuard } from '@nestjs/passport';
import { Request } from 'express';
import { AppService } from './app.service';
import { GetUser } from './auth/get-user.decorator';
import { User } from './user/user.entity';

@Controller()
export class AppController {
  constructor(private readonly appService: AppService) {}

  @UseGuards(AuthGuard('jwt'))
  @Get('firebase')
  getHello(@GetUser() user: User): string {
    // console.log('User', JSON.stringify(request['user']));
    console.log('User from Database: ', user);
    return this.appService.getHello();
  }
}
