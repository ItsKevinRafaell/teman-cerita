<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class AdditionalRolesSeeder extends Seeder
{
    public function run()
    {
        // Membuat role jika belum ada
        $evaluator = Role::firstOrCreate(['name' => 'evaluator']);
        $writer = Role::firstOrCreate(['name' => 'writer']);
        $user = Role::firstOrCreate(['name' => 'user']);

        $articlePermissions = [
            'view_article',
            'view_any_article',
            'create_article',
            'update_article',
            'restore_article',
            'replicate_article',
            'reorder_article',
            'delete_article',
            'force_delete_article',
            'view_article::category',
            'view_any_article::category',
            'create_article::category',
            'update_article::category',
            'restore_article::category',
            'replicate_article::category',
            'reorder_article::category',
            'delete_article::category',
            'force_delete_article::category',
        ];

        $categoryPermissions = [
            'view_article_category',
            'view_any_article_category',
            'create_article_category',
            'update_article_category',
            'restore_article_category',
            'replicate_article_category',
            'reorder_article_category',
            'delete_article_category',
            'force_delete_article_category',
        ];

        $assessmentPermissions = [
            'view_question::answer',
            'view_any_question::answer',
            'create_question::answer',
            'update_question::answer',
            'restore_question::answer',
            'restore_any_question::answer',
            'replicate_question::answer',
            'reorder_question::answer',
            'delete_question::answer',
            'delete_any_question::answer',
            'force_delete_question::answer',
            'force_delete_any_question::answer',
            'view_question::assessment',
            'view_any_question::assessment',
            'create_question::assessment',
            'update_question::assessment',
            'restore_question::assessment',
            'restore_any_question::assessment',
            'replicate_question::assessment',
            'reorder_question::assessment',
            'delete_question::assessment',
            'delete_any_question::assessment',
            'force_delete_question::assessment',
            'force_delete_any_question::assessment',
            'view_questionnaire::type',
            'view_any_questionnaire::type',
            'create_questionnaire::type',
            'update_questionnaire::type',
            'restore_questionnaire::type',
            'restore_any_questionnaire::type',
            'replicate_questionnaire::type',
            'reorder_questionnaire::type',
            'delete_questionnaire::type',
            'delete_any_questionnaire::type',
            'force_delete_questionnaire::type',
            'force_delete_any_questionnaire::type',
            'view_score::range',
            'view_any_score::range',
            'create_score::range',
            'update_score::range',
            'restore_score::range',
            'restore_any_score::range',
            'replicate_score::range',
            'reorder_score::range',
            'delete_score::range',
            'delete_any_score::range',
            'force_delete_score::range',
            'force_delete_any_score::range',
        ];

        foreach ($assessmentPermissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
            $evaluator->givePermissionTo($permission);
        }

        foreach (array_merge($articlePermissions, $categoryPermissions) as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
            $writer->givePermissionTo($permission);
        }


        $userPermissions = [];
        foreach ($userPermissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
            $user->givePermissionTo($permission);
        }

        $writerUser = User::firstOrCreate(
            ['email' => 'writer@temancerita.com'],
            [
                'name' => 'Writer',
                'password' => Hash::make('writer1234'),
            ]
        );
        $writerUser->assignRole($writer);

        $evaluatorUser = User::firstOrCreate(
            ['email' => 'evaluator@temancerita.com'],
            [
                'name' => 'Evaluator',
                'password' => Hash::make('evaluator1234'),
            ]
        );
        $evaluatorUser->assignRole($evaluator);
    }
}
