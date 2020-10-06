<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Allocation;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class ImportExcelController extends Controller
{
    public function store(Request $request)
    {
        $reader = new Xlsx();
        $spreadsheet = $reader->load($request->file('routine'));
        $rows = array();
        $worksheet = $spreadsheet->getActiveSheet();
        foreach ($worksheet->getRowIterator() as $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(FALSE);
            $row = [];
            foreach ($cellIterator as $cell) {
                $row[] = $cell->getValue();
                // $cell->getStyle()->getFill()->getStartColor()->getRGB(); // color picker
            }
            if (empty($row[4])) {
                break;
            }
            $rows[] = $row;
        }
        foreach ($rows[0] as $key => $col) {
            $index[$col] = $key;
        }
        $rows = array_slice($rows, 1);
        $datas = array();
        $cnt = 0;
        foreach ($rows as $row) {
            $data = [];
            if ($row[0] != null) {
                $data['semester'] = $row[$index['SEMESTER']];
                $sections = array_filter(preg_split("/[\s,()]+/", $row[$index['SECTION']]));
                $data['sections'] = array_slice($sections, 0, sizeof($sections) != 1 ? sizeof($sections) - 1 : 1);
                $data['number_of_student'] = sizeof($sections) != 1 ? (int)$sections[sizeof($sections) - 1] : 0;
                $teachers = [];
                for ($i = $index['A']; $i < sizeof($index); $i++) {
                    if (!empty($row[$i])) {
                        $teachers[] = [
                            'initial' => $row[$i],
                            'section' => chr(65 + ($i - $index['A']))
                        ];
                    }
                }
                $data['courses'][] = [
                    'credit' => $row[$index['CRE']],
                    'code' => $row[$index['CODE']],
                    'name' => $row[$index['COURSE NAME']],
                    'teachers' => $teachers
                ];
                $datas[] = $data;
                $cnt++;
            } else {
                $teachers = [];
                for ($i = $index['A']; $i < sizeof($index); $i++) {
                    if (!empty($row[$i])) {
                        $teachers[] = [
                            'initial' => $row[$i],
                            'section' => chr(65 + ($i - $index['A']))
                        ];
                    }
                }
                $data = [
                    'credit' => $row[$index['CRE']],
                    'code' => $row[$index['CODE']],
                    'name' => $row[$index['COURSE NAME']],
                    'teachers' => $teachers
                ];
                $datas[$cnt - 1]['courses'][] = $data;
            }
        }
        Allocation::truncate();
        $color = Color::pluck('_id')->all();
        foreach ($datas as $index => $data) {
            Allocation::create([
                'semester' => $data['semester'],
                'color_id' => $color[$index],
                'sections' => $data['sections'],
                'number_of_student' => $data['number_of_student'],
                'courses' => $data['courses'],
            ]);
        }
        return redirect()->back()->with('success', "Allocation Successfully Uploaded");
    }
}
