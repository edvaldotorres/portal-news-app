<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'name' => 'Gestão de Notícias: Cadastrar Notícia',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Gestão de Notícias: Editar Notícia',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Gestão de Notícias: Remover Notícia',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Gestão de Usuários: Listagem de Usuários',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Gestão de Usuários: Cadastrar Usuário',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Gestão de Usuários: Editar Usuário',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Gestão de Usuários: Remover Usuário',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Gestão de Usuários: Perfil do Usuário',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Gestão de Perfis: Listagem de Perfis',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Gestão de Perfis: Cadastrar Perfil',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Gestão de Perfis: Editar Perfil',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Gestão de Perfis: Remover Perfil',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Gestão de Perfis: Permissões do Perfil',
                'guard_name' => 'web',
            ],
        ];

        foreach ($permissions as $permission) {
            DB::table('permissions')->insert([
                'name' => $permission['name'],
                'guard_name' => $permission['guard_name'],
            ]);
        }
    }
}
