<?php

namespace App\Services;

use App\Models\LMS\CourseSlot;
use DB;
use Illuminate\Support\Str;
use App\Repositories\CourseSlotRepositoryInterface;

class CourseSlotService
{
    public function __construct(

        protected CourseSlotRepositoryInterface $repository

    ){}

    public function store(array $data)
    {
        return DB::transaction(function() use($data){

            $data['uuid']=Str::uuid();

            $data['available_seats']=$data['capacity'];

            $slot=$this->repository->create($data);

            foreach($data['teacher_ids'] as $teacher){

                $slot->teachers()->create([

                    'teacher_id'=>$teacher['teacher_id'],

                ]);

            }

            return $slot;

        });
    }

    public function update($slot,array $data)
    {
        return DB::transaction(function() use($slot,$data){

            if(
                isset($data['capacity'])
                &&
                $slot->capacity!=$data['capacity']
            ){

                $booked=$slot->capacity-$slot->available_seats;

                $data['available_seats']
                    =
                    $data['capacity']-$booked;
            }

            $slot=$this->repository->update($slot,$data);

            if(isset($data['teacher_ids'])){

                $slot->teachers()->delete();

                foreach($data['teacher_ids'] as $teacher){

                    $slot->teachers()->create([

                        'teacher_id'=>$teacher['teacher_id'],

                    ]);

                }

            }

            return $slot;

        });
    }
    public function paginate(int $perPage = 15)
{
    return CourseSlot::with([
            'course',
            'trainingCenter',
            'teachers.teacher'
        ])
        ->latest()
        ->paginate($perPage);
}
public function find(int $id)
{
    return CourseSlot::with([
            'course',
            'version',
            'trainingCenter',
            'teachers.teacher'
        ])
        ->findOrFail($id);
}

public function delete(CourseSlot $slot): void
{
    $slot->delete();
}

}