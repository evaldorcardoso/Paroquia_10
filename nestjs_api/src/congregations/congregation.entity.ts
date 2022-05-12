import { User } from '../user/user.entity';
import {
  BaseEntity,
  Column,
  Entity,
  Generated,
  Index,
  JoinTable,
  ManyToMany,
  PrimaryGeneratedColumn,
} from 'typeorm';

@Entity()
@Index(['id', 'uuid'])
export class Congregation extends BaseEntity {
  @PrimaryGeneratedColumn('increment')
  id: number;

  @Column()
  @Generated('uuid')
  uuid: string;

  @Column({ nullable: false, type: 'varchar', length: 100 })
  name: string;

  @Column({ nullable: true, type: 'blob' })
  description: string;

  @Column({ nullable: false, type: 'varchar', length: 150 })
  address: string;

  @ManyToMany(() => User)
  @JoinTable({
    name: 'congregation_user',
    joinColumn: { name: 'congregation_id' },
    inverseJoinColumn: { name: 'user_id' },
  })
  has: User[];
}
