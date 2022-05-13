import { BaseQueryParametersDto } from '../../shared/base-query-parameters.dto';

export class FindCongregationsQueryDto extends BaseQueryParametersDto {
  name: string;
  address: string;
}
