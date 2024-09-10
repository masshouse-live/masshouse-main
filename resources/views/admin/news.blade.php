@extends('layouts.admin')

@section('content')
    <main class="flex flex-col h-screen space-y-6 ">
        <div class="pt-5 w-full flex py-2 px-4 justify-between items-center">
            <h2 class="font-extrabold text-2xl text-accent">News & Blogs Management</h2>
            @include('forms.add-news', ['id' => 'add-news'])
        </div>
        <div class="flex flex-col px-4 space-y-4 overflow-auto">
            <div class="text-start bg-secondary px-5 py-4 border-2 border-accent/20  w-full rounded-md shadow ">
                <h2 class="text-xl font-bold text-accent">Filter News & Blogs</h2>
                <div class="flex justify-between items-center">
                    <div class="flex py-3 gap-5">
                        <div class="flex flex-col space-y-2">
                            <label for="from_date" class="text-textSecondary font-semibold">
                                From Date
                            </label>
                            <input type="date" id="from_date"
                                class="border border-accent/20 bg-primary rounded-md px-2 py-1" name="from_date"
                                defaultValue={searchParams?.from_date} />
                        </div>
                        <div class="flex flex-col space-y-2">
                            <label for="to_date" class="text-textSecondary font-semibold">
                                To Date
                            </label>
                            <input type="date" class="border border-accent/20 bg-primary rounded-md px-2 py-1"
                                name="to_date" id="to_date" defaultValue={searchParams?.to_date} />
                        </div>
                        <div class="flex flex-col space-y-2">
                            <label for="status" class="text-textSecondary font-semibold">
                                Status
                            </label>
                            <select class="border border-accent/20 bg-primary rounded-md px-5 py-1 " name="status"
                                id="status">
                                <option value="">All</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <form class="flex flex-col space-y-2">
                            <label for="search" class="text-textSecondary font-semibold">
                                Search
                            </label>
                            <input type="search" class="border border-accent/20 bg-primary rounded-md px-2 py-1"
                                name="search" id="search" defaultValue={searchParams?.search} />
                            <button class="hidden"></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="bg-primary py-4 w-full rounded-md  grid grid-cols-5 items-center">
                @foreach ($news as $news_)
                    <div class="flex flex-col space-y-1 border aspect-square p-1 overflow-hidden">
                        <img src="{{ asset($news_->image) }}" alt="{{ $news_->title }}"
                            class="w-full object-cover aspect-video" />
                        <div class="flex flex-col space-y-2 px-2">
                            <h3 class="text-xl font-bold line-clamp-2">{{ $news_->title }}</h3>
                            <div class="flex justify-between items-center ">
                                <span class="text-accent font-semibold">{{ $news_->category }}</span>
                                <p class="text-textSecondary font-semibold justify-end text-end flex ">
                                    Created: {{ $news_->created_at->diffForHumans() }}
                                </p>
                            </div>
                            <p class="text-textSecondary font-semibold line-clamp-1">
                                {{ $news_->short_description }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

            {{ $news->links('pagination::tailwind') }}
        </div>
    </main>
@endsection
