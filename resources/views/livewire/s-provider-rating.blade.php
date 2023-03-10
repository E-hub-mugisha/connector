<div>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    @forelse ($comments as $comment)
    <div class="review">
        <div class="row no-gutters">
            <div class="col-md-3">
                <h4><a href="{{ '@' . $comment->user->username }}">{{ $comment->user->name }}.</a></h4>
                <div class="ratings-container">
                    <div class="ratings">
                        @if($comment->rating == 5 )
                        <div class="ratings-val" style="width: 100%;"></div>
                        @elseif($comment->rating == 4 )
                        <div class="ratings-val" style="width: 80%;"></div>
                        @elseif($comment->rating == 3 )
                        <div class="ratings-val" style="width: 60%;"></div>
                        @elseif($comment->rating == 2 )
                        <div class="ratings-val" style="width: 40%;"></div>
                        @else($comment->rating == 1 )
                        <div class="ratings-val" style="width: 10%;"></div>
                        @endif

                        @auth
                        @if(auth()->user()->id == $comment->user_id || auth()->user()->utype == 'ADM' ))
                        - <a wire:click.prevent="delete({{ $comment->id }})" class="text-sm cursor-pointer">Delete</a>
                        @endif
                        @endauth
                    </div><!-- End .ratings-val -->
                </div><!-- End .ratings -->
                <span class="review-date">{{$comment->created_at}}</span>
            </div><!-- End .rating-container -->
            <div class="col-md-9">
                <div class="review-content">
                    <p>{{ $comment->comment }}</p>
                </div><!-- End .review-content -->

            </div><!-- End .col-auto -->
        </div><!-- End .col -->

    </div><!-- End .row -->
</div><!-- End .review -->
@empty
<div class="flex col-span-1">
    <div class="relative px-4 mb-16 leading-6 text-left">
        <div class="box-border text-lg font-medium text-gray-600">
            No ratings
        </div>
    </div>
</div>
@endforelse



<section class="w-full px-8 pt-4 pb-10 xl:px-8">
    <div class="max-w-5xl mx-auto">
        <div class="flex flex-col items-center md:flex-row">

            <div class="w-full mt-16 md:mt-0">
                <div class="relative z-10 h-auto p-4 py-10 overflow-hidden bg-white border-b-2 border-gray-300 rounded-lg shadow-2xl px-7">
                    @auth
                    <div class="w-full space-y-5">
                        <p class="font-medium text-blue-500 uppercase">
                            Rate this product
                        </p>
                    </div>
                    @if (session()->has('message'))
                    <p class="text-xl text-gray-600 md:pr-16">
                        {{ session('message') }}
                    </p>
                    @endif
                    @if($hideForm != true)
                    <form wire:submit.prevent="rate()">
                        <div class="block max-w-3xl px-1 py-2 mx-auto">
                            <div class="flex space-x-1 rating">
                                <label for="star1">
                                    <input hidden wire:model="rating" type="radio" id="star1" name="rating" value="1" />
                                    <svg class="cursor-pointer block w-8 h-8 @if($rating >= 1 ) text-indigo-500 @else text-grey @endif " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                    </svg>
                                </label>
                                <label for="star2">
                                    <input hidden wire:model="rating" type="radio" id="star2" name="rating" value="2" />
                                    <svg class="cursor-pointer block w-8 h-8 @if($rating >= 2 ) text-indigo-500 @else text-grey @endif " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                    </svg>
                                </label>
                                <label for="star3">
                                    <input hidden wire:model="rating" type="radio" id="star3" name="rating" value="3" />
                                    <svg class="cursor-pointer block w-8 h-8 @if($rating >= 3 ) text-indigo-500 @else text-grey @endif " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                    </svg>
                                </label>
                                <label for="star4">
                                    <input hidden wire:model="rating" type="radio" id="star4" name="rating" value="4" />
                                    <svg class="cursor-pointer block w-8 h-8 @if($rating >= 4 ) text-indigo-500 @else text-grey @endif " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                    </svg>
                                </label>
                                <label for="star5">
                                    <input hidden wire:model="rating" type="radio" id="star5" name="rating" value="5" />
                                    <svg class="cursor-pointer block w-8 h-8 @if($rating >= 5 ) text-indigo-500 @else text-grey @endif " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                    </svg>
                                </label>
                            </div>
                            <div class="my-5">
                                @error('comment')
                                <p class="mt-1 text-red-500">{{ $message }}</p>
                                @enderror
                                <textarea wire:model.lazy="comment" name="description" class="block w-full px-4 py-3 border border-2 rounded-lg focus:border-blue-500 focus:outline-none" placeholder="Comment.."></textarea>
                            </div>
                        </div>
                        <div class="block">
                            <button type="submit" class="w-full px-3 py-4 font-medium text-white bg-blue-600 rounded-lg">Rate</button>
                            @auth
                            @if($currentId)
                            <button type="submit" class="w-full px-3 py-4 mt-4 font-medium text-white bg-red-400 rounded-lg" wire:click.prevent="delete({{ $currentId }})" class="text-sm cursor-pointer">Delete</button>
                            @endif
                            @endauth
                        </div>
                    </form>
                    @endif
                    @else
                    <div>
                        <div class="mb-8 text-center text-gray-600">
                            You need to login in order to be able to rate the product!
                        </div>
                        <a href="/login" class="block px-5 py-2 mx-auto font-medium text-center text-gray-600 bg-white border rounded-lg shadow-sm focus:outline-none hover:bg-gray-100">Login Here</a>
                        <a href="/register" class="block px-5 py-2 mx-auto font-medium text-center text-gray-600 bg-white border rounded-lg shadow-sm focus:outline-none hover:bg-gray-100">Register</a>
                    </div>
                    @endauth
                </div>
            </div>

        </div>
    </div>
</section>

</div>

