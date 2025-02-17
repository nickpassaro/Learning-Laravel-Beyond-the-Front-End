@props(['job' => null, 'type' => ''])

<form class="mb-4 flex flex-wrap"
      method="POST"
      action="{{ $type == 'create' ? route('showAllJobs') : ($job ? route('showSingleJob', ['job' => $job->id]) : '') }}">
    @csrf
    @if ($type == 'edit')
        @method('PATCH')
    @endif
    <div class="mb-4 w-full">
        <x-form-label for="title">
            Title
        </x-form-label>
        <x-form-input full="true"
                      type="text"
                      name="title"
                      :resource="$job" />
    </div>
    <div class="mb-4 w-full">
        <x-form-label for="description">Description</x-form-label>
        <x-form-textarea full="true"
                         name="description"
                         :resource="$job" />
    </div>
    <div
         class="mb-4 grid w-full grid-cols-1 grid-rows-3 gap-4 sm:grid-cols-2 sm:grid-rows-2 lg:grid-cols-3 lg:grid-rows-1">
        <div class="flex grow flex-col sm:col-span-2 lg:col-span-1">
            <x-form-label for="location">Location</x-form-label>
            <x-form-input type="text"
                          name="location"
                          :resource="$job" />
        </div>
        <div class="flex grow flex-col">
            <x-form-label for="job_type">Job Type</x-form-label>
            <x-form-select name="job_type"
                           :options="['Full-time', 'Part-time']"
                           :resource="$job" />
        </div>
        <div class="flex grow flex-col">
            <x-form-label for="salary">Salary</x-form-label>
            <x-form-input type="text"
                          name="salary"
                          :resource="$job" />
        </div>
    </div>
    <div class="flex justify-between">
        <x-primary-button type="submit"
                          class="mr-4">Submit</x-primary-button>
        @if ($type == 'edit' && $job)
            <a href="{{ route('showSingleJob', ['job' => $job->id]) }}"
               class="mr-4 self-start px-4 py-2 font-bold text-black">Cancel</a>
            <button type="submit"
                    class="mr-4 font-bold text-red-500"
                    form="delete">Delete</button>
        @endif
    </div>
</form>
@if ($type == 'edit')
    @if ($job)
        <form class="mb-4"
              method="POST"
              action="{{ route('showSingleJob', ['job' => $job->id]) }}"
              id="delete"
              hidden>
    @endif
    @csrf
    @method('DELETE')
    </form>
@endif
@if ($errors->any())
    <div class="text-red-500">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-sm">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
