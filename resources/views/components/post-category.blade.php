@props(['post'])
@if($post->categories->count() > 0)
                <div class="flex gap-2 item-center mb-2">
                  @foreach($post->categories as $index => $category)
                      <a href="{{ route('category.show', $category->slug) }}" 
                          class="bg-blue-300 text-blue-900 text-xs px-2 py-1 rounded-full mr-2 mb-2 hover:bg-blue-200 transition"> 
                          {{ $category->name }}
                      </a>
                  @endforeach
                </div>
              @endif