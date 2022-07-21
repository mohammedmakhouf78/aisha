@extends('admin.master')

@section('css')
@endsection

@section('content')
    <div class="row" style="direction: rtl;text-align:right">
        <div class="col">
            <div class="card">
                <div class="card-header bg-primary text-light" style="text-align: right">
                    الحضور
                </div>
                <div class="card-body card-block">
                    <form action="{{ route('admin.attend.update') }}" method="post" class="form-horizontal">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="attend_id" value="{{ $attend->id }}">





                        <x-form.select-object name="student_id" label="اختر الطالب" :collection="$students" field="name"
                            :selected="$attend->student_id" />

                        <x-form.select-object name="lesson_id" label="اختر الدرس" :collection="$lessons" field="name"
                            :selected="$attend->lesson_id" />

                        <x-form.date name="date" label=" تاريخ" :value="$attend->date" />




                        <x-form.checkbok name="attend" check=" {{ $attend->attend == 1 ? 'checked' : '' }}"
                            label="الحضور" />


                        <x-form.textarea name="note" label="ملاحظة" :value="$attend->note" />




                        <div class="m-3">
                            <button type="submit" class="btn btn-success float-right">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection


@section('javascript')
@endsection
