@props([
    'name',
    'label' => null,
    'options' => [],
    'selected' => [],
    'placeholder' => 'Select options...',
    'required' => false,
])

@php
    $fieldName = str_replace('[]', '', $name);

    $items = collect($options)->map(function ($item) {
        return [
            'id' => data_get($item, 'id'),
            'name' => data_get($item, 'name'),
        ];
    })->values();
@endphp

<div
    x-data="{
        open:false,
        search:'',
        options:@js($items),
        selected:@js(old($fieldName, $selected)),

        toggle(id){
            if(this.selected.includes(id)){
                this.selected=this.selected.filter(i=>i!=id);
            }else{
                this.selected.push(id);
            }
        },

        selectedName(id){
            let item=this.options.find(x=>x.id==id);
            return item ? item.name : '';
        },

        filteredOptions(){
            if(this.search=='') return this.options;

            return this.options.filter(item =>
                item.name.toLowerCase().includes(this.search.toLowerCase())
            );
        },

        isSelected(id){
            return this.selected.includes(id);
        },

        selectAll(){
            this.selected=this.options.map(x=>x.id);
        },

        clearAll(){
            this.selected=[];
        }
    }"
    class="w-full"
>

    @if($label)
        <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
            {{ $label }}
            @if($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif

    <div class="relative" @click.away="open=false">

        {{-- Hidden Inputs --}}
        <template x-for="id in selected" :key="id">
            <input
                type="hidden"
                name="{{ str_replace('[]','',$name) }}[]"
                :value="id"
            >
        </template>

        {{-- Select Box --}}
        <div
            @click="open=!open"
            class="flex min-h-[44px] cursor-pointer flex-wrap items-center gap-2 rounded-lg border border-gray-300 bg-white px-3 py-2 dark:border-gray-700 dark:bg-gray-900"
        >

            <template x-if="selected.length==0">
                <span class="text-gray-400 text-sm">
                    {{ $placeholder }}
                </span>
            </template>

            <template x-for="id in selected" :key="id">

                <span
                    class="flex items-center rounded-full bg-gray-100 px-3 py-1 text-sm dark:bg-gray-800"
                >

                    <span x-text="selectedName(id)"></span>

                    <button
                        type="button"
                        @click.stop="toggle(id)"
                        class="ml-2 text-red-500"
                    >
                        ✕
                    </button>

                </span>

            </template>

            <div class="ml-auto">

                <svg
                    class="h-5 w-5 transition"
                    :class="open ? 'rotate-180':''"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M19 9l-7 7-7-7"
                    />
                </svg>

            </div>

        </div>

        {{-- Dropdown --}}
        <div
            x-show="open"
            x-transition
            class="absolute z-50 mt-2 w-full rounded-lg border border-gray-200 bg-white shadow-xl dark:border-gray-700 dark:bg-gray-900"
        >

            {{-- Search --}}
            <div class="p-2">

                <input
                    x-model="search"
                    type="text"
                    placeholder="Search..."
                    class="w-full rounded border border-gray-300 px-3 py-2 text-sm focus:outline-none dark:border-gray-700 dark:bg-gray-800"
                >

            </div>

            {{-- Buttons --}}
            <div class="flex justify-between border-b px-3 py-2">

                <button
                    type="button"
                    class="text-sm text-blue-600"
                    @click="selectAll()"
                >
                    Select All
                </button>

                <button
                    type="button"
                    class="text-sm text-red-600"
                    @click="clearAll()"
                >
                    Clear
                </button>

            </div>

            {{-- Options --}}
            <div class="max-h-60 overflow-y-auto">

                <template
                    x-for="option in filteredOptions()"
                    :key="option.id"
                >

                    <div
                        @click="toggle(option.id)"
                        class="text-sm flex cursor-pointer items-center justify-between px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-800"
                    >

                        <span x-text="option.name"></span>

                        <svg
                            x-show="isSelected(option.id)"
                            class="h-5 w-5 text-green-600"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M5 13l4 4L19 7"
                            />
                        </svg>

                    </div>

                </template>

            </div>

        </div>

    </div>

    @error($fieldName)
        <p class="mt-1 text-sm text-red-600">
            {{ $message }}
        </p>
    @enderror

</div>