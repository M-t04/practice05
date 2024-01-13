<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Game</title>
    </head>
   <body>
       <form action='/posts' method="POST">
           @csrf
           <div class='body'>
               <h1>新規投稿作成</h1>
               <textarea name="post[body]" placeholder='入力スペース'></textarea>
           </div>
           <div class='category'>
               <h2>カテゴリー</h2>
               <select name='post[category_id]'>
                   @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        <!--$categoriesにはカテゴリーの全件データが入っているので、こちらを1件ずつ表示しています。-->
                    @endforeach
               </select>
           </div>
       <input type="submit" value="投稿する" />
       </form>
   </body>
</html>
