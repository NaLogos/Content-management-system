@extends('layouts.app')

@section('content')

    <div class="card card-default">
    
        <div class="card-header">
            {{ isset($post) ? 'Edit Post' : 'Create Post' }}
        </div>

        <div class="card-body">
            @include('partials.error')
            <form action="{{ isset($post) ? route('posts.update',$post->id) : route('posts.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($post))
                    @method('PUT')
                @endif

                <div class="form-group">
                    <label for="title">Title</label>
                    <input name="title" id="title" class="form-control" type="text" value="{{ isset($post) ? $post->title : '' }}">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" cols="5" rows="5">{{ isset($post) ? $post->description : '' }}</textarea>
                </div> 

                <div class="form-group">
                    <label for="content">Content</label>
                    <input id="content" type="hidden" name="content" value="{{ isset($post) ? $post->content : '' }}">
                    <trix-editor input="content"></trix-editor>
                </div>

                <div class="form-group">
                    <label for="published_at">Published At</label>
                    <input name="published_at" id="published_at" class="form-control" type="text" value="{{ isset($post) ? $post->published_at : '' }}">
                </div>
                @if(isset($post))
                    <div class="form-group">
                        <img src="{{asset($post->image)}}" alt="" style="width:100%">
                    </div>
                @endif

                <div class="form-group">
                    <label for="image">Image</label>
                    <input name="image" id="image" class="form-control" type="file">
                </div>

                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" id="category_id" class='form-control'>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}"
                                @if(isset($post))
                                    @if($category->id == $post->category_id)
                                        selected
                                    @endif
                                @endif
                            >
                                {{$category->name}}
                            </option>
                        @endforeach
                    </select>

                    <div class="form-group">
                        <label for="tags">Tags</label>
                        @if($tags->count() > 0)
                            <select name="tags[]" id="tags" class="form-control" multiple>
                                @foreach($tags as $tag)
                                    <option value="{{$tag->id}}"
                                        @if(isset($post))
                                            @if($post->hasTag($tag->id))
                                                selected
                                            @endif
                                        @endif
                                    >
                                    {{$tag->name}}</option>
                                @endforeach
                            </select>
                        @else
                            <h2 class="form-control">No Tags Available</h2>
                        @endif
                    </div>

                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        {{ isset($post) ? 'Update Post' : 'Create Post' }}
                    </button>
                </div>

            </form>
        </div>
    
    </div>

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js" integrity="sha256-2D+ZJyeHHlEMmtuQTVtXt1gl0zRLKr51OCxyFfmFIBM=" crossorigin="anonymous"></script>
    <script>
        flatpickr('#published_at',{enableTime: true})
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css" integrity="sha256-yebzx8LjuetQ3l4hhQ5eNaOxVLgqaY1y8JcrXuJrAOg=" crossorigin="anonymous" />
@endsection