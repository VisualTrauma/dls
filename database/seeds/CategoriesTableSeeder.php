<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Category::create([
            'name'             => 'JOB DESCRIPTION',
            'departments'      => 'QMR, HR',
            'created_by'       => '1',
            'retention_period' => 0
        ]);

        Category::create([
            'name'             => 'STAFF TRAINING RECORDS',
            'departments'      => 'TRNG',
            'created_by'       => '1',
            'retention_period' => 0
        ]);

        Category::create([
            'name'             => 'MANAGEMENT REVIEW AGENDA',
            'departments'      => 'QMR',
            'created_by'       => '1',
            'retention_period' => 5
        ]);

        Category::create([
            'name'             => 'MANAGEMENT REVIEW MINUTES',
            'departments'      => 'QMR',
            'created_by'       => '1',
            'retention_period' => 5
        ]);

        Category::create([
            'name'             => 'NCR/CAR',
            'departments'      => 'QMR',
            'created_by'       => '1',
            'retention_period' => 5
        ]);

        Category::create([
            'name'             => 'DOCUMENT REVISION RECORDS HOLDER(CURRENT)',
            'departments'      => 'QMR',
            'created_by'       => '1',
            'retention_period' => 0
        ]);

        Category::create([
            'name'             => 'REVISION REQUEST',
            'departments'      => 'QMR',
            'created_by'       => '1',
            'retention_period' => 5
        ]);

        Category::create([
            'name'             => 'REVISION MONITOR',
            'departments'      => 'QMR',
            'created_by'       => '1',
            'retention_period' => 5
        ]);

        Category::create([
            'name'             => 'CLIENTS COMPLAINTS',
            'departments'      => 'QMR',
            'created_by'       => '1',
            'retention_period' => 5
        ]);

        Category::create([
            'name'             => 'REGISTER OF NSCPI RECORDS',
            'departments'      => 'QMR',
            'created_by'       => '1',
            'retention_period' => 0
        ]);

        Category::create([
            'name'             => 'TRAINING AGREEMENTS',
            'departments'      => 'TRNG',
            'created_by'       => '1',
            'retention_period' => 5
        ]);

        Category::create([
            'name'             => 'LIST OF TRAINING CERTIFICATES',
            'departments'      => 'TRNG',
            'created_by'       => '1',
            'retention_period' => 5
        ]);

        Category::create([
            'name'             => 'COURSE EVALUATION',
            'departments'      => 'TRNG',
            'created_by'       => '1',
            'retention_period' => 5
        ]);

        Category::create([
            'name'             => 'INSTRUCTOR EVALUATION',
            'departments'      => 'TRNG',
            'created_by'       => '1',
            'retention_period' => 5
        ]);

        Category::create([
            'name'             => 'IMO MODEL COURSES(RELEVANT)',
            'departments'      => 'TRNG',
            'created_by'       => '1',
            'retention_period' => 0
        ]);

        Category::create([
            'name'             => 'COURSE CURRICULUM',
            'departments'      => 'TRNG',
            'created_by'       => '1',
            'retention_period' => 0
        ]);

        Category::create([
            'name'             => "INSTRUCTOR'S MANUAL/GUIDANCE",
            'departments'      => 'TRNG',
            'created_by'       => '1',
            'retention_period' => 0
        ]);

        Category::create([
            'name'             => 'SCHEDULE OF CLASSES',
            'departments'      => 'TRNG',
            'created_by'       => '1',
            'retention_period' => 0
        ]);

        Category::create([
            'name'             => 'MANUAL DISTRIBUTION LIST',
            'departments'      => 'QMR',
            'created_by'       => '1',
            'retention_period' => 0
        ]);

        Category::create([
            'name'             => 'REQUISITION LIST',
            'departments'      => 'FNA',
            'created_by'       => '1',
            'retention_period' => 3
        ]);

        Category::create([
            'name'             => 'PURCHASE ORDER',
            'departments'      => 'FNA',
            'created_by'       => '1',
            'retention_period' => 3
        ]);

        Category::create([
            'name'             => 'LIST OF APPROVED SUPPLIERS',
            'departments'      => 'FNA',
            'created_by'       => '1',
            'retention_period' => 0
        ]);
        Category::create([
            'name'             => 'INVOICE',
            'departments'      => 'FNA',
            'created_by'       => '1',
            'retention_period' => 3
        ]);

        Category::create([
            'name'             => 'QUALITY MANAGEMENT ASSESSMENT FORM',
            'departments'      => 'QMR',
            'created_by'       => '1',
            'retention_period' => 3
        ]);

        Category::create([
            'name'             => 'RELEVANT INDUSTRY PUBLICATION',
            'departments'      => 'TRNG',
            'created_by'       => '1',
            'retention_period' => 0
        ]);

        Category::create([
            'name'             => 'MEMORANDUM CIRCULARS',
            'departments'      => 'HR',
            'created_by'       => '1',
            'retention_period' => 3
        ]);

        Category::create([
            'name'             => 'CURRICULUM DESIGN PLANNING',
            'departments'      => 'RND',
            'created_by'       => '1',
            'retention_period' => 0
        ]);

        Category::create([
            'name'             => 'LIST OF CUSTOMER SUPPLIED DATA & MATERIAL',
            'departments'      => 'QMR',
            'created_by'       => '1',
            'retention_period' => 0
        ]);

        Category::create([
            'name'             => 'CURRENT REGISTRATION RECORDS',
            'departments'      => 'TRNG',
            'created_by'       => '1',
            'retention_period' => 3
        ]);

        Category::create([
            'name'             => 'RECORDS OF OFFICIAL RECEIPTS',
            'departments'      => 'FNA',
            'created_by'       => '1',
            'retention_period' => 5
        ]);

        Category::create([
            'name'             => 'RECORDS OF PHYSICAL INSPECTIONS',
            'departments'      => 'TRNG',
            'created_by'       => '1',
            'retention_period' => 3
        ]);

        Category::create([
            'name'             => 'INVENTORY LIST OF TOOLS/INSTRUMENTS/EQUIPMENTS',
            'departments'      => 'TRNG',
            'created_by'       => '1',
            'retention_period' => 0
        ]);

        Category::create([
            'name'             => 'ASSESSMENT PROCEDURES RESULTS',
            'departments'      => 'TRNG',
            'created_by'       => '1',
            'retention_period' => 0
        ]);

        Category::create([
            'name'             => 'COURSE SYLLABUS MODULES',
            'departments'      => 'TRNG',
            'created_by'       => '1',
            'retention_period' => 0
        ]);

        Category::create([
            'name'             => 'INVENTORY LIST OF TEXTBOOKS AND RELATED MATERIALS',
            'departments'      => 'TRNG',
            'created_by'       => '1',
            'retention_period' => 0
        ]);

        Category::create([
            'name'             => 'FAMILIARIZATION CHECKLIST FORM',
            'departments'      => 'HR',
            'created_by'       => '1',
            'retention_period' => 0
        ]);

        Category::create([
            'name'             => 'APPOINTMENT LETTER',
            'departments'      => 'HR',
            'created_by'       => '1',
            'retention_period' => 0
        ]);
    }
}
