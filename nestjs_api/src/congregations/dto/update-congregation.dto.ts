import { IsOptional, IsString } from 'class-validator';

export class UpdateCongregationDto {
  @IsOptional()
  @IsString({
    message: 'Informe o nome da congregação',
  })
  name?: string;

  @IsOptional()
  @IsString({
    message: 'Informe o endereço da congregação',
  })
  address?: string;
}
