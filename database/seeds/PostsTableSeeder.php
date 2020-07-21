<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Post;
use App\Category;
use App\Tag;
use App\User;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1 = Category::create([
            'name' => 'News'
        ]);

        $author1 = User::create([
            'name'     => 'John Doe',
            'email'    => 'jon@doe.com',
            'role' => 'writer',
            'password' => Hash::make('password')
        ]);

        $category2 = Category::create([
            'name' => 'Marketing'
        ]);

        $author2 = User::create([
            'name'     => 'Taha Elmail',
            'email'    => 'taha@elmail.com',
            'role' => 'writer',
            'password' => Hash::make('password')
        ]);

        $category3 = Category::create([
            'name' => 'Partnership'
        ]);

        $tag1 = Tag::create([
            'name' => 'Job'
        ]);

        $tag2 = Tag::create([
            'name' => 'Customers'
        ]);

        $tag3 = Tag::create([
            'name' => 'Record'
        ]);
        
        $post1 = $author1->posts()->create([
            'title' => 'We relocated our office to a new designed garage',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis faucibus diam. Integer vitae ipsum nec risus mollis pharetra. Sed blandit felis vel commodo ornare. Vivamus cursus, arcu nec molestie commodo, erat nisl malesuada lacus, in volutpat ex dolor vel enim. Vestibulum venenatis, quam sit amet commodo dapibus, odio mi posuere neque, et vulputate neque sapien in est. Sed vehicula nunc ac est rhoncus laoreet. Sed laoreet tempus massa, vitae facilisis dui dictum non. Donec sed elit tortor. Sed lacus tellus, imperdiet at ante et, interdum lacinia magna. Ut aliquet congue consequat.',
            'content' => 'Ut ultrices faucibus risus id pharetra. Sed bibendum laoreet ex, sit amet congue lorem molestie ut. Etiam faucibus enim eget quam rutrum sagittis. Fusce eget eleifend ex. Praesent nec rhoncus turpis, sit amet tincidunt libero. Cras lobortis malesuada enim, ac eleifend quam rutrum a. In ut dui maximus, mollis nisi eget, semper lorem. Duis cursus ex sed justo bibendum rutrum. Phasellus tempor justo vitae quam elementum consectetur. Duis sed mi sed diam finibus accumsan. Integer vel nibh congue, imperdiet lorem nec, tempor urna. Quisque vel dignissim mi, ut tincidunt sapien. Vivamus in magna pellentesque, venenatis erat nec, lacinia augue. Cras id metus ac massa rhoncus porta. Donec scelerisque risus nec tellus ullamcorper, vitae pharetra est finibus. Aliquam varius semper cursus. Phasellus auctor interdum lacus quis mattis. Nulla facilisi. Vestibulum in justo quis magna pellentesque posuere. Curabitur non quam ipsum. Fusce nisl odio, bibendum ut diam vitae, suscipit consectetur magna. Nunc vitae urna libero. Aenean sagittis urna id sapien commodo, et tempor quam dictum. In risus est, venenatis sed tellus ac, sagittis finibus lectus. Aliquam interdum, eros id commodo dapibus, dui nulla vestibulum urna, sed dapibus magna lorem id eros. Etiam tempus malesuada ligula, nec molestie tellus sollicitudin blandit. Proin tristique dolor ut lacus tincidunt, non dignissim odio volutpat.',
            'category_id' => $category1->id,
            'image' => 'storage/posts/1.jpg'
        ]);

        $post2 = $author2->posts()->create([
            'title' => 'Top 5 brilliant content marketing strategies',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis faucibus diam. Integer vitae ipsum nec risus mollis pharetra. Sed blandit felis vel commodo ornare. Vivamus cursus, arcu nec molestie commodo, erat nisl malesuada lacus, in volutpat ex dolor vel enim. Vestibulum venenatis, quam sit amet commodo dapibus, odio mi posuere neque, et vulputate neque sapien in est. Sed vehicula nunc ac est rhoncus laoreet. Sed laoreet tempus massa, vitae facilisis dui dictum non. Donec sed elit tortor. Sed lacus tellus, imperdiet at ante et, interdum lacinia magna. Ut aliquet congue consequat.',
            'content' => 'Ut ultrices faucibus risus id pharetra. Sed bibendum laoreet ex, sit amet congue lorem molestie ut. Etiam faucibus enim eget quam rutrum sagittis. Fusce eget eleifend ex. Praesent nec rhoncus turpis, sit amet tincidunt libero. Cras lobortis malesuada enim, ac eleifend quam rutrum a. In ut dui maximus, mollis nisi eget, semper lorem. Duis cursus ex sed justo bibendum rutrum. Phasellus tempor justo vitae quam elementum consectetur. Duis sed mi sed diam finibus accumsan. Integer vel nibh congue, imperdiet lorem nec, tempor urna. Quisque vel dignissim mi, ut tincidunt sapien. Vivamus in magna pellentesque, venenatis erat nec, lacinia augue. Cras id metus ac massa rhoncus porta. Donec scelerisque risus nec tellus ullamcorper, vitae pharetra est finibus. Aliquam varius semper cursus. Phasellus auctor interdum lacus quis mattis. Nulla facilisi. Vestibulum in justo quis magna pellentesque posuere. Curabitur non quam ipsum. Fusce nisl odio, bibendum ut diam vitae, suscipit consectetur magna. Nunc vitae urna libero. Aenean sagittis urna id sapien commodo, et tempor quam dictum. In risus est, venenatis sed tellus ac, sagittis finibus lectus. Aliquam interdum, eros id commodo dapibus, dui nulla vestibulum urna, sed dapibus magna lorem id eros. Etiam tempus malesuada ligula, nec molestie tellus sollicitudin blandit. Proin tristique dolor ut lacus tincidunt, non dignissim odio volutpat.',
            'category_id' => $category2->id,
            'image' => 'storage/posts/2.jpg'
        ]);

        $post3 = $author1->posts()->create([
            'title' => 'Best practices for minimalist design with example',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis faucibus diam. Integer vitae ipsum nec risus mollis pharetra. Sed blandit felis vel commodo ornare. Vivamus cursus, arcu nec molestie commodo, erat nisl malesuada lacus, in volutpat ex dolor vel enim. Vestibulum venenatis, quam sit amet commodo dapibus, odio mi posuere neque, et vulputate neque sapien in est. Sed vehicula nunc ac est rhoncus laoreet. Sed laoreet tempus massa, vitae facilisis dui dictum non. Donec sed elit tortor. Sed lacus tellus, imperdiet at ante et, interdum lacinia magna. Ut aliquet congue consequat.',
            'content' => 'Ut ultrices faucibus risus id pharetra. Sed bibendum laoreet ex, sit amet congue lorem molestie ut. Etiam faucibus enim eget quam rutrum sagittis. Fusce eget eleifend ex. Praesent nec rhoncus turpis, sit amet tincidunt libero. Cras lobortis malesuada enim, ac eleifend quam rutrum a. In ut dui maximus, mollis nisi eget, semper lorem. Duis cursus ex sed justo bibendum rutrum. Phasellus tempor justo vitae quam elementum consectetur. Duis sed mi sed diam finibus accumsan. Integer vel nibh congue, imperdiet lorem nec, tempor urna. Quisque vel dignissim mi, ut tincidunt sapien. Vivamus in magna pellentesque, venenatis erat nec, lacinia augue. Cras id metus ac massa rhoncus porta. Donec scelerisque risus nec tellus ullamcorper, vitae pharetra est finibus. Aliquam varius semper cursus. Phasellus auctor interdum lacus quis mattis. Nulla facilisi. Vestibulum in justo quis magna pellentesque posuere. Curabitur non quam ipsum. Fusce nisl odio, bibendum ut diam vitae, suscipit consectetur magna. Nunc vitae urna libero. Aenean sagittis urna id sapien commodo, et tempor quam dictum. In risus est, venenatis sed tellus ac, sagittis finibus lectus. Aliquam interdum, eros id commodo dapibus, dui nulla vestibulum urna, sed dapibus magna lorem id eros. Etiam tempus malesuada ligula, nec molestie tellus sollicitudin blandit. Proin tristique dolor ut lacus tincidunt, non dignissim odio volutpat.',
            'category_id' => $category3->id,
            'image' => 'storage/posts/3.jpg'
        ]);

        $post4 = $author2->posts()->create([
            'title' => 'Congratulate and thank to Maryam for joining our team',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis faucibus diam. Integer vitae ipsum nec risus mollis pharetra. Sed blandit felis vel commodo ornare. Vivamus cursus, arcu nec molestie commodo, erat nisl malesuada lacus, in volutpat ex dolor vel enim. Vestibulum venenatis, quam sit amet commodo dapibus, odio mi posuere neque, et vulputate neque sapien in est. Sed vehicula nunc ac est rhoncus laoreet. Sed laoreet tempus massa, vitae facilisis dui dictum non. Donec sed elit tortor. Sed lacus tellus, imperdiet at ante et, interdum lacinia magna. Ut aliquet congue consequat.',
            'content' => 'Ut ultrices faucibus risus id pharetra. Sed bibendum laoreet ex, sit amet congue lorem molestie ut. Etiam faucibus enim eget quam rutrum sagittis. Fusce eget eleifend ex. Praesent nec rhoncus turpis, sit amet tincidunt libero. Cras lobortis malesuada enim, ac eleifend quam rutrum a. In ut dui maximus, mollis nisi eget, semper lorem. Duis cursus ex sed justo bibendum rutrum. Phasellus tempor justo vitae quam elementum consectetur. Duis sed mi sed diam finibus accumsan. Integer vel nibh congue, imperdiet lorem nec, tempor urna. Quisque vel dignissim mi, ut tincidunt sapien. Vivamus in magna pellentesque, venenatis erat nec, lacinia augue. Cras id metus ac massa rhoncus porta. Donec scelerisque risus nec tellus ullamcorper, vitae pharetra est finibus. Aliquam varius semper cursus. Phasellus auctor interdum lacus quis mattis. Nulla facilisi. Vestibulum in justo quis magna pellentesque posuere. Curabitur non quam ipsum. Fusce nisl odio, bibendum ut diam vitae, suscipit consectetur magna. Nunc vitae urna libero. Aenean sagittis urna id sapien commodo, et tempor quam dictum. In risus est, venenatis sed tellus ac, sagittis finibus lectus. Aliquam interdum, eros id commodo dapibus, dui nulla vestibulum urna, sed dapibus magna lorem id eros. Etiam tempus malesuada ligula, nec molestie tellus sollicitudin blandit. Proin tristique dolor ut lacus tincidunt, non dignissim odio volutpat.',
            'category_id' => $category2->id,
            'image' => 'storage/posts/4.jpg'
        ]);

        $post1->tags()->attach([$tag1->id,$tag2->id]);

        $post2->tags()->attach([$tag3->id,$tag2->id]);

        $post3->tags()->attach([$tag1->id,$tag3->id]);

        $post4->tags()->attach([$tag1->id,$tag2->id,$tag3->id]);
    }
}
