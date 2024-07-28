<?php

namespace Database\Seeders;

use App\Models\QuestionnaireType;
use App\Models\QuestionAssessments;
use App\Models\QuestionAnswer;
use App\Models\ScoreRange;
use Illuminate\Database\Seeder;

class AdditionalAssessmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Data untuk questionnaire_types dan question_assessments
        $data = [
            [
                'type' => 'Generalized Anxiety Disorder-7 (GAD-7)',
                'description' => 'A tool used to assess the severity of generalized anxiety disorder.',
                'questions' => [
                    'Merasa gugup, cemas, atau gelisah',
                    'Tidak mampu menghentikan atau mengendalikan kekhawatiran',
                    'Terlalu khawatir tentang hal-hal yang berbeda',
                    'Kesulitan bersantai',
                    'Menjadi sangat gelisah sehingga sulit untuk duduk diam',
                    'Menjadi mudah tersinggung atau mudah tersinggung',
                    'Merasa takut, seolah-olah ada sesuatu yang buruk mungkin terjadi',
                ],
                'score_ranges' => [
                    ['min_score' => 0, 'max_score' => 4, 'interpretation' => 'Kecemasan minimal', 'interpretation_description' => 'Tidak ada atau sangat sedikit gejala kecemasan.'],
                    ['min_score' => 5, 'max_score' => 9, 'interpretation' => 'Kecemasan ringan', 'interpretation_description' => 'Gejala kecemasan ringan.'],
                    ['min_score' => 10, 'max_score' => 14, 'interpretation' => 'Kecemasan sedang', 'interpretation_description' => 'Gejala kecemasan sedang.'],
                    ['min_score' => 15, 'max_score' => 21, 'interpretation' => 'Kecemasan berat', 'interpretation_description' => 'Gejala kecemasan berat.'],
                ],
                'answers' => [
                    [
                        'answer_option' => "Tidak sama sekali",
                        'answer_option_description' => "Anda tidak pernah mengalami gejala tersebut dalam dua minggu terakhir.",
                        'answer_number' => 0
                    ],
                    [
                        'answer_option' => "Beberapa hari",
                        'answer_option_description' => "Anda mengalami gejala tersebut beberapa kali selama dua minggu terakhir, tetapi tidak sering.",
                        'answer_number' => 1
                    ],
                    [
                        'answer_option' => "Lebih dari separuh waktu",
                        'answer_option_description' => "Anda mengalami gejala tersebut lebih dari separuh waktu selama dua minggu terakhir, tetapi tidak setiap hari.",
                        'answer_number' => 2
                    ],
                    [
                        'answer_option' => "Hampir setiap hari",
                        'answer_option_description' => "Anda mengalami gejala tersebut hampir setiap hari selama dua minggu terakhir.",
                        'answer_number' => 3
                    ],
                ],
            ],
            [
                'type' => 'Patient Health Questionnaire-9 (PHQ-9)',
                'description' => 'A multipurpose instrument for screening, diagnosing, monitoring, and measuring the severity of depression.',
                'questions' => [
                    'Merasa sedih, murung, atau putus asa',
                    'Kehilangan minat atau kesenangan dalam melakukan hal-hal yang biasanya Anda nikmati',
                    'Kesulitan tidur atau tidur terlalu banyak',
                    'Merasa lelah atau kurang energi',
                    'Nafsu makan menurun atau makan terlalu banyak',
                    'Merasa buruk tentang diri sendiri atau merasa bahwa Anda gagal atau telah mengecewakan diri sendiri atau keluarga',
                    'Kesulitan berkonsentrasi pada hal-hal, seperti membaca koran atau menonton televisi',
                    'Bergerak atau berbicara sangat lambat sehingga orang lain mungkin memperhatikan, atau sebaliknya - menjadi sangat gelisah sehingga Anda lebih banyak bergerak dari biasanya',
                    'Memiliki pikiran bahwa Anda lebih baik mati atau ingin melukai diri sendiri dalam beberapa cara',
                ],
                'score_ranges' => [
                    ['min_score' => 0, 'max_score' => 4, 'interpretation' => 'Depresi minimal minimal', 'interpretation_description' => 'Tidak ada atau sangat sedikit gejala kecemasan.'],
                    ['min_score' => 5, 'max_score' => 9, 'interpretation' => 'Depresi ringan', 'interpretation_description' => 'Gejala kecemasan ringan.'],
                    ['min_score' => 10, 'max_score' => 14, 'interpretation' => 'Depresi sedang', 'interpretation_description' => 'Gejala kecemasan sedang.'],
                    ['min_score' => 15, 'max_score' => 19, 'interpretation' => 'Depresi berat', 'interpretation_description' => 'Gejala kecemasan berat.'],
                    ['min_score' => 20, 'max_score' => 27, 'interpretation' => 'Depresi sangat berat', 'interpretation_description' => 'Gejala kecemasan berat.'],
                ],
                'answers' => [
                    [
                        'answer_option' => "Tidak sama sekali",
                        'answer_option_description' => "Anda tidak pernah mengalami gejala tersebut dalam dua minggu terakhir.",
                        'answer_number' => 0
                    ],
                    [
                        'answer_option' => "Beberapa hari",
                        'answer_option_description' => "Anda mengalami gejala tersebut beberapa kali selama dua minggu terakhir, tetapi tidak sering.",
                        'answer_number' => 1
                    ],
                    [
                        'answer_option' => "Lebih dari separuh waktu",
                        'answer_option_description' => "Anda mengalami gejala tersebut lebih dari separuh waktu selama dua minggu terakhir, tetapi tidak setiap hari.",
                        'answer_number' => 2
                    ],
                    [
                        'answer_option' => "Hampir setiap hari",
                        'answer_option_description' => "Anda mengalami gejala tersebut hampir setiap hari selama dua minggu terakhir.",
                        'answer_number' => 3
                    ],
                ],
            ],
            [
                'type' => 'Kessler Psychological Distress Scale (K10)',
                'description' => 'A simple measure of psychological distress.',
                'questions' => [
                    'Merasa lelah tanpa alasan yang jelas',
                    'Merasa gugup',
                    'Merasa putus asa',
                    'Merasa gelisah atau tidak bisa diam',
                    'Merasa begitu tertekan sehingga tidak ada yang bisa menenangkan',
                    'Merasa sedih atau murung',
                    'Merasa lelah atau kurang energi',
                    'Merasa sangat mudah marah atau marah',
                    'Merasa sulit untuk santai',
                    'Merasa tidak berharga',
                ],
                'score_ranges' => [
                    ['min_score' => 10, 'max_score' => 19, 'interpretation' => 'Distress minimal', 'interpretation_description' => 'Tidak ada atau sangat sedikit gejala kecemasan.'],
                    ['min_score' => 20, 'max_score' => 24, 'interpretation' => 'Distress ringan', 'interpretation_description' => 'Gejala kecemasan ringan.'],
                    ['min_score' => 25, 'max_score' => 29, 'interpretation' => 'Distress sedang', 'interpretation_description' => 'Gejala kecemasan sedang.'],
                    ['min_score' => 30, 'max_score' => 50, 'interpretation' => 'Distress berat', 'interpretation_description' => 'Gejala kecemasan berat.'],
                ],
                'answers' => [
                    [
                        'answer_option' => "Tidak sama sekali",
                        'answer_option_description' => "Anda tidak pernah mengalami gejala tersebut dalam empat minggu terakhir.",
                        'answer_number' => 0
                    ],
                    [
                        'answer_option' => "Kadang-kadang",
                        'answer_option_description' => "Anda mengalami gejala tersebut kadang-kadang dalam empat minggu terakhir.",
                        'answer_number' => 1
                    ],
                    [
                        'answer_option' => "Sering",
                        'answer_option_description' => "Anda sering mengalami gejala tersebut dalam empat minggu terakhir.",
                        'answer_number' => 2
                    ],
                    [
                        'answer_option' => "Hampir selalu",
                        'answer_option_description' => "Anda hampir selalu mengalami gejala tersebut dalam empat minggu terakhir.",
                        'answer_number' => 3
                    ],
                ],

            ],
            [
                'type' => 'Beck Depression Inventory-II (BDI-II)',
                'description' => 'A self-report inventory used to measure the severity of depression.',
                'questions' => [
                    'Merasa sedih',
                    'Pessimisme tentang masa depan',
                    'Merasa seperti gagal',
                    'Kehilangan minat atau kesenangan dalam aktivitas',
                    'Merasa bersalah',
                    'Merasa dihukum',
                    'Tidak puas dengan diri sendiri',
                    'Kritik terhadap diri sendiri',
                    'Pikiran untuk bunuh diri',
                    'Menangis lebih sering dari biasanya',
                    'Kehilangan minat terhadap orang lain',
                    'Kesulitan dalam membuat keputusan',
                    'Merasa tidak berguna',
                    'Kehilangan energi',
                    'Perubahan pola tidur (tidur lebih banyak atau lebih sedikit)',
                    'Mudah marah',
                    'Perubahan nafsu makan (makan lebih banyak atau lebih sedikit)',
                    'Kesulitan berkonsentrasi',
                    'Kelelahan atau keletihan',
                    'Kehilangan minat pada seks',
                ],
                'score_ranges' => [
                    ['min_score' => 0, 'max_score' => 13, 'interpretation' => 'Depresi minimal', 'interpretation_description' => 'Tidak ada atau sangat sedikit gejala kecemasan.'],
                    ['min_score' => 14, 'max_score' => 19, 'interpretation' => 'Depresi ringan', 'interpretation_description' => 'Gejala kecemasan ringan.'],
                    ['min_score' => 20, 'max_score' => 28, 'interpretation' => 'Depresi sedang', 'interpretation_description' => 'Gejala kecemasan sedang.'],
                    ['min_score' => 29, 'max_score' => 63, 'interpretation' => 'Depresi berat', 'interpretation_description' => 'Gejala kecemasan berat.'],
                ],
                'answers' => [
                    [
                        'answer_option' => "Tidak sama sekali",
                        'answer_option_description' => "Anda tidak pernah mengalami gejala tersebut dalam dua minggu terakhir.",
                        'answer_number' => 0
                    ],
                    [
                        'answer_option' => "Ringan",
                        'answer_option_description' => "Anda mengalami gejala tersebut tetapi dalam tingkat yang ringan.",
                        'answer_number' => 1
                    ],
                    [
                        'answer_option' => "Sedang",
                        'answer_option_description' => "Anda mengalami gejala tersebut dalam tingkat sedang.",
                        'answer_number' => 2
                    ],
                    [
                        'answer_option' => "Berat",
                        'answer_option_description' => "Anda mengalami gejala tersebut dalam tingkat yang berat.",
                        'answer_number' => 3
                    ],
                ],


            ],
            [
                'type' => 'WHO-5 Well-Being Index',
                'description' => 'A short global rating scale measuring subjective well-being.',
                'questions' => [
                    'Saya merasa bersemangat dan dalam semangat yang baik',
                    'Saya merasa tenang dan santai',
                    'Saya merasa aktif dan memiliki energi',
                    'Saya bangun dengan perasaan segar dan istirahat',
                    'Hidup saya penuh dengan hal-hal yang menarik',
                ],
                'score_ranges' => [
                    ['min_score' => 0, 'max_score' => 5, 'interpretation' => 'Kesejahteraan sangat rendah', 'interpretation_description' => 'Tidak ada atau sangat sedikit gejala kecemasan.'],
                    ['min_score' => 6, 'max_score' => 10, 'interpretation' => 'Kesejahteraan rendah', 'interpretation_description' => 'Gejala kecemasan ringan.'],
                    ['min_score' => 11, 'max_score' => 15, 'interpretation' => 'Kesejahteraan sedang', 'interpretation_description' => 'Gejala kecemasan sedang.'],
                    ['min_score' => 16, 'max_score' => 20, 'interpretation' => 'Kesejahteraan tinggi', 'interpretation_description' => 'Gejala kecemasan berat.'],
                ],
                'answers' => [
                    [
                        'answer_option' => "Tidak sama sekali",
                        'answer_option_description' => "Anda tidak pernah mengalami gejala tersebut dalam dua minggu terakhir.",
                        'answer_number' => 0
                    ],
                    [
                        'answer_option' => "Kadang-kadang",
                        'answer_option_description' => "Anda mengalami gejala tersebut kadang-kadang dalam dua minggu terakhir.",
                        'answer_number' => 1
                    ],
                    [
                        'answer_option' => "Sering",
                        'answer_option_description' => "Anda sering mengalami gejala tersebut dalam dua minggu terakhir.",
                        'answer_number' => 2
                    ],
                    [
                        'answer_option' => "Hampir selalu",
                        'answer_option_description' => "Anda hampir selalu mengalami gejala tersebut dalam dua minggu terakhir.",
                        'answer_number' => 3
                    ],
                ],


            ],
        ];

        // Loop through each questionnaire type and create the corresponding records
        foreach ($data as $entry) {
            $questionnaireType = QuestionnaireType::create([
                'name' => $entry['type'],
                'description' => $entry['description'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            foreach ($entry['questions'] as $content) {
                QuestionAssessments::create([
                    'questionnaire_type_id' => $questionnaireType->id,
                    'content' => $content,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            foreach ($entry['answers'] as $contents) {
                QuestionAnswer::create([
                    'questionnaire_type_id' => $questionnaireType->id,
                    'answer_option' => $contents['answer_option'],
                    'answer_option_description' => $contents['answer_option_description'],
                    'answer_number' => $contents['answer_number'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            foreach ($entry['score_ranges'] as $range) {
                ScoreRange::create([
                    'questionnaire_type_id' => $questionnaireType->id,
                    'min_score' => $range['min_score'],
                    'max_score' => $range['max_score'],
                    'interpretation' => $range['interpretation'],
                    'interpretation_description' => $range['interpretation_description'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
