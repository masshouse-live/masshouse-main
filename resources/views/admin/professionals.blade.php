@extends('layouts.admin')

@section('content')
<main class="flex flex-col h-screen space-y-6 ">
    <div class="pt-5 w-full flex py-2 px-4 justify-between items-center">
        <h2 class="font-extrabold text-2xl text-accent">Professionals Management</h2>
        <button class="py-1 px-5 flex items-center space-x-2 bg-accent shadow rounded text-white">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
            stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" 
            d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg><span>New Professional</span></button>
      </div>
      <div class="flex flex-col px-4 space-y-4 overflow-auto">
      <div class="text-start bg-secondary px-5 py-4 border-2 border-accent/20  w-full rounded-md shadow ">
        <h2 class="text-xl font-bold text-accent">Filter Professionals</h2>
        <div class="flex justify-between items-center">
          <div class="flex py-3 gap-5">
            <div class="flex flex-col space-y-2">
              <label
                for="from_date"
                class="text-textSecondary font-semibold"
              >
                From Date
              </label>
              <input
                type="date"
                id="from_date"
                class="border border-accent/20 bg-primary rounded-md px-2 py-1"
                name="from_date"
                defaultValue={searchParams?.from_date}
              />
            </div>
            <div class="flex flex-col space-y-2">
              <label
                for="to_date"
                class="text-textSecondary font-semibold"
              >
                To Date
              </label>
              <input
                type="date"
                class="border border-accent/20 bg-primary rounded-md px-2 py-1"
                name="to_date"
                id="to_date"
                defaultValue={searchParams?.to_date}
              />
            </div>
            <div class="flex flex-col space-y-2">
              <label
                for="status"
                class="text-textSecondary font-semibold"
              >
                Status
              </label>
              <select
                class="border border-accent/20 bg-primary rounded-md px-5 py-1 "
                name="status"
                id="status"
              >
                <option value="">All</option>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
              </select>
            </div>
            <form
              class="flex flex-col space-y-2"
            >
              <label
                for="search"
                class="text-textSecondary font-semibold"
              >
                Search
              </label>
              <input
                type="search"
                class="border border-accent/20 bg-primary rounded-md px-2 py-1"
                name="search"
                id="search"
                defaultValue={searchParams?.search}
              />
              <button class="hidden"></button>
            </form>
          </div>
        </div>
      </div>
      <div class="px-5 py-4 border-2 border-accent/20  bg-primary w-full rounded-md shadow ">
        <div class="grid grid-cols-7 item-end text-end gap-2 font-medium">
          <a
            class="text-start flex justify-start space-x-0.5"
          >
            <span>Event Title</span>
            <div class="flex flex-col">
              <span class="text-gray-400 ">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                  class="w-5 h-5 -mb-2"
                >
                  <path
                    fillRule="evenodd"
                    d="M14.77 12.79a.75.75 0 01-1.06-.02L10 8.832 6.29 12.77a.75.75 0 11-1.08-1.04l4.25-4.5a.75.75 0 011.08 0l4.25 4.5a.75.75 0 01-.02 1.06z"
                    clipRule="evenodd"
                  />
                </svg>
              </span>
              <span class="text-gray-400">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                  class="w-5 h-5 -mt-1"
                >
                  <path
                    fillRule="evenodd"
                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                    clipRule="evenodd"
                  />
                </svg>
              </span>
            </div>
          </a>
          <a
            class="flex  w-full justify-end"
          >
            Event Date
            <div class="flex flex-col">
              <span class="text-gray-400 ">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                  class="w-5 h-5 -mb-2"
                >
                  <path
                    fillRule="evenodd"
                    d="M14.77 12.79a.75.75 0 01-1.06-.02L10 8.832 6.29 12.77a.75.75 0 11-1.08-1.04l4.25-4.5a.75.75 0 011.08 0l4.25 4.5a.75.75 0 01-.02 1.06z"
                    clipRule="evenodd"
                  />
                </svg>
              </span>
              <span class="text-gray-400">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                  class="w-5 h-5 -mt-1"
                >
                  <path
                    fillRule="evenodd"
                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                    clipRule="evenodd"
                  />
                </svg>
              </span>
            </div>
          </a>

          <a
            class="flex  w-full justify-end"
          >
            <span>Event Venue</span>
            <div class="flex flex-col">
              <span class="text-gray-400 ">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                  class="w-5 h-5 -mb-2"
                >
                  <path
                    fillRule="evenodd"
                    d="M14.77 12.79a.75.75 0 01-1.06-.02L10 8.832 6.29 12.77a.75.75 0 11-1.08-1.04l4.25-4.5a.75.75 0 011.08 0l4.25 4.5a.75.75 0 01-.02 1.06z"
                    clipRule="evenodd"
                  />
                </svg>
              </span>
              <span class="text-gray-400">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                  class="w-5 h-5 -mt-1"
                >
                  <path
                    fillRule="evenodd"
                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                    clipRule="evenodd"
                  />
                </svg>
              </span>
            </div>
          </a>
          <a
            class="flex w-full justify-end "
          >
            Event Tag
            <div class="flex flex-col">
              <span class="text-gray-400 ">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                  class="w-5 h-5 -mb-2"
                >
                  <path
                    fillRule="evenodd"
                    d="M14.77 12.79a.75.75 0 01-1.06-.02L10 8.832 6.29 12.77a.75.75 0 11-1.08-1.04l4.25-4.5a.75.75 0 011.08 0l4.25 4.5a.75.75 0 01-.02 1.06z"
                    clipRule="evenodd"
                  />
                </svg>
              </span>
              <span class="text-gray-400">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                  class="w-5 h-5 -mt-1"
                >
                  <path
                    fillRule="evenodd"
                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                    clipRule="evenodd"
                  />
                </svg>
              </span>
            </div>
          </a>
          <a
            class="flex  w-full justify-end"
          >
            Event Link
            <div class="flex flex-col">
              <span class="text-gray-400 ">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                  class="w-5 h-5 -mb-2"
                >
                  <path
                    fillRule="evenodd"
                    d="M14.77 12.79a.75.75 0 01-1.06-.02L10 8.832 6.29 12.77a.75.75 0 11-1.08-1.04l4.25-4.5a.75.75 0 011.08 0l4.25 4.5a.75.75 0 01-.02 1.06z"
                    clipRule="evenodd"
                  />
                </svg>
              </span>
              <span class="text-gray-400">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                  class="w-5 h-5 -mt-1"
                >
                  <path
                    fillRule="evenodd"
                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                    clipRule="evenodd"
                  />
                </svg>
              </span>
            </div>
          </a>
          <a
            class="flex  w-full justify-end"
          >
            Created At
            <div class="flex flex-col">
              <span class="text-gray-400 ">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                  class="w-5 h-5 -mb-2"
                >
                  <path
                    fillRule="evenodd"
                    d="M14.77 12.79a.75.75 0 01-1.06-.02L10 8.832 6.29 12.77a.75.75 0 11-1.08-1.04l4.25-4.5a.75.75 0 011.08 0l4.25 4.5a.75.75 0 01-.02 1.06z"
                    clipRule="evenodd"
                  />
                </svg>
              </span>
              <span class="text-gray-400">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                  class="w-5 h-5 -mt-1"
                >
                  <path
                    fillRule="evenodd"
                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                    clipRule="evenodd"
                  />
                </svg>
              </span>
            </div>
          </a>
          <span>Action</span>
        </div>
      </div>
      <div class="px-5 py-4 border-2 border-accent/20  bg-primary w-full rounded-md shadow space-y-4">
       
    </div>
      </div>
</main>
@endsection
