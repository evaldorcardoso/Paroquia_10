import {
  BaseEntity,
  Column,
  CreateDateColumn,
  Entity,
  PrimaryGeneratedColumn,
  Unique,
  UpdateDateColumn,
} from 'typeorm';
import { UserRole } from './user-roles.enum';

@Entity()
@Unique(['uuid'])
export class User extends BaseEntity {
  @PrimaryGeneratedColumn('increment')
  id: number;

  @Column()
  uuid: string;

  @Column({ nullable: false, type: 'varchar', length: 100 })
  email: string;

  @Column({ nullable: false, type: 'varchar', length: 100 })
  name: string;

  @Column({ type: 'varchar' })
  picture: string;

  @Column({ nullable: false })
  email_verified: boolean;

  @Column({ type: 'simple-enum', enum: UserRole, default: UserRole.USER })
  role: UserRole;

  @CreateDateColumn()
  created_at: Date;

  @UpdateDateColumn()
  updated_at: Date;
}
