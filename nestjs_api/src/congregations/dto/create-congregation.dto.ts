import { IsNotEmpty, MinLength } from 'class-validator';

export class CreateCongregationDto {
  @IsNotEmpty({
    message: 'Informe o nome da Congregação',
  })
  @MinLength(3, {
    message: 'O nome da congregação deve ter no mínimo 3 caracteres',
  })
  name: string;

  description: string;

  @IsNotEmpty({
    message: 'Informe o endereço da Congregação',
  })
  @MinLength(5, {
    message: 'O endereço da congregação deve ter no mínimo 5 caracteres',
  })
  address: string;
}
