<div class="mx-auto flex flex-col gap-4 lg:flex-row justify-center">
    <section class="rounded-b-lg mt-4">
        @auth("web")
            <form wire:submit.prevent="add">
                <textarea wire:model="text" class="w-full shadow-inner p-4 border-0 mb-4 rounded-lg focus:shadow-outline text-2xl @error('text') border-red-500 @enderror" placeholder="Your feedback..." spellcheck="false"></textarea>

                @error('text')
                    @include('partials.error', ['message' => $message])
                @enderror

                <button type="submit" class="font-bold py-2 px-4 w-full bg-purple-400 text-lg text-white shadow-md rounded-lg ">Send</button>
            </form>
        @endauth

        <div id="task-comments" class="pt-4">
            @foreach($model->comments as $comment)
                <div class="bg-white rounded-lg p-3  flex flex-col justify-center items-center md:items-start shadow-lg mb-4">
                    <div class="flex flex-row justify-center mr-2">
                        <h3 class="text-purple-600 font-semibold text-lg text-center md:text-left ">{{ $comment->user->name }}</h3>
                    </div>
                    <p style="width: 90%" class="text-gray-600 text-lg text-center md:text-left ">{{ $comment->text }}</p>
                </div>
            @endforeach
        </div>
    </section>
</div>
