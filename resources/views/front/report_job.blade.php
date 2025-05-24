@extends('front.layouts.app')
@section('title', $project->name)
@section('content')

    <body class="font-poppins text-[#030303] bg-[#F6F5FA] pb-[100px] px-4 sm:px-0">
        <x-nav />


        <section id="breadcrumb" class="container max-w-[1130px] mx-auto mt-[30px]">
            <div class="flex gap-[30px] items-center">
                <a href="{{ route('front.index') }}"
                    class="last-of-type:font-semibold active:font-semibold transition-all duration-300">Browse</a>
                <span>/</span>
                <a href="{{ route('front.details', $project) }}"
                    class="last-of-type:font-semibold active:font-semibold transition-all duration-300">Projects</a>
                <span>/</span>
                <a href=""
                    class="last-of-type:font-semibold active:font-semibold transition-all duration-300">Apply</a>
            </div>
        </section>
        <section id="details"
            class="container max-w-[1130px] mx-auto flex flex-col sm:flex-row sm:flex-nowrap gap-5 mt-[30px]">
            <div class="flex flex-col gap-5">
                <div class="bg-white flex flex-col gap-5 p-5 rounded-[20px] h-fit">
                    <div class="flex flex-col sm:flex-row items-center gap-5">
                        <div class="flex shrink-0 w-[230px] h-[150px] rounded-[20px] overflow-hidden">
                            <img src="{{ Storage::url($project->thumbnail) }}" class="w-full h-full object-cover"
                                alt="thumbnail">
                        </div>
                        <div class="flex flex-col gap-1">
                            @if ($project->has_finished)
                                <div
                                    class="font-bold text-xs leading-[18px] text-white bg-[#F3445C] p-[2px_10px] rounded-full w-fit">
                                    CLOSED
                                </div>
                            @else
                                @if ($project->has_started)
                                    <div
                                        class="font-bold text-xs leading-[18px] text-white bg-[#2E82FE] p-[2px_10px] rounded-full w-fit">
                                        IN PROGRESS
                                    </div>
                                @else
                                    <div
                                        class="font-bold text-xs leading-[18px] text-white bg-[#2E82FE] p-[2px_10px] rounded-full w-fit">
                                        HIRING
                                    </div>
                                @endif
                            @endif
                            <h1 class="font-extrabold text-[30px] leading-[45px]">{{ $project->name }}</h1>
                        </div>
                    </div>
                </div>
                <div class="bg-white flex flex-col gap-5 p-5 rounded-[20px] h-fit">
                    <h2 class="font-bold text-xl leading-[30px]">Report Details</h2>
                    <p class="font-semibold">Detailed Explanation</p>
                    <form method="POST" action="{{ route('front.apply_job.store', $project) }}"
                        class="flex flex-col gap-5">
                        @csrf
                        <div class="flex p-[14px_20px] border border-[#030303] rounded-[20px] gap-[10px]">
                            <div class="w-6 h-6 flex shrink-0">
                                <img src="{{ asset('assets/icons/sms-star.svg') }}" alt="icon">
                            </div>
                            <textarea name="description" id="" rows="8"
                                class="focus:outline-none appearance-none font-medium leading-[30px] placeholder:font-normal placeholder:text-[#545768] w-full resize-none"
                                placeholder="Please provide detailed information about your report"></textarea>
                        </div>
                        <div class="flex flex-col sm:flex-row gap-3 items-center">
                            <button type="submit"
                                class="font-semibold bg-[#F3445C] p-[14px_20px] rounded-full text-center w-full text-white">Report
                                Now</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="flex flex-col sm:w-[300px] h-fit shrink-0 bg-white rounded-[20px] p-5 gap-[30px]">
                <div class="flex flex-col gap-3">
                    <h3 class="font-semibold">About Client</h3>
                    <div class="flex items-center gap-3">
                        <div class="w-[50px] h-[50px] rounded-full overflow-hidden flex shrink-0">
                            <img src="{{ Storage::url($project->owner->avatar) }}" class="w-full h-full object-cover"
                                alt="photo">
                        </div>
                        <div class="flex flex-col gap-[2px]">
                            <p class="font-semibold">{{ $project->owner->name }}</p>
                            <p class="text-sm leading-[21px] text-[#545768]">{{ $project->owner->projects->count() }} Total
                                Projects</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-[6px]">
                        <div class="flex items-center">
                            <div>
                                <img src="{{ asset('assets/icons/Star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icons/Star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icons/Star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icons/Star.svg') }}" alt="star">
                            </div>
                            <div>
                                <img src="{{ asset('assets/icons/Star-grey.svg') }}" alt="star">
                            </div>
                            <p class="font-semibold text-sm">(4)</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
@endsection
