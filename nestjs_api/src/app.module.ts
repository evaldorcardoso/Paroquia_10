import { Module } from '@nestjs/common';
import { ConfigModule } from '@nestjs/config';
import { TypeOrmModule } from '@nestjs/typeorm';
import { getConnectionOptions } from 'typeorm';
import { AppController } from './app.controller';
import { AppService } from './app.service';
import { AuthStrategy } from './auth/auth.strategy';
import { UserModule } from './user/user.module';
import { UserRepository } from './user/user.repository';
import { CongregationsModule } from './congregations/congregations.module';

@Module({
  imports: [
    ConfigModule.forRoot({ isGlobal: true }),
    TypeOrmModule.forRootAsync({
      useFactory: async () =>
        Object.assign(await getConnectionOptions(), {
          autoLoadEntities: true,
        }),
    }),
    TypeOrmModule.forFeature([UserRepository]),
    UserModule,
    CongregationsModule,
  ],
  controllers: [AppController],
  providers: [AppService, AuthStrategy],
})
export class AppModule {}
