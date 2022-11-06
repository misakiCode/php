## サーバーの立ち上げ
```
php artisan serve
```
http://127.0.0.1:8000
で確認可能

## routeの確認
```
php artisan route:list
```
自動生成される場合もあるので、たまに確認すると良い

## ルーティングの設定
`routes/web.php`に記述<br>

```
 Route::get('/folders/{id}/tasks', 'TaskController@index')->name('tasks.index'); 
```
getで/folders/{id}/tasksにリクエストが来たらTaskControllerコントローラのindexメソッドを呼び出す。<br>
アプリケーションの中でURLを参照する際はtasks.indexを使う。

## コントローラクラスの生成
コントローラクラスはcmdからひな形を生成する。<br>
```php:title
$ php artisan make:controller TaskController
```
`app/Http/Controllers`にTaskControllerが生成される。

## データベースの設定
データベースは先に作成しておく。.envファイルで設定を行う<br>
```php:env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=todo  //データベース名
DB_USERNAME=root
DB_PASSWORD=admin
```

## マイグレーション
### マイグレーションの作成
cmdから作成する<br>
```
$ php artisan make:migration create_folders_table --create=folders
```
`database/migrations`に`作成日時_create_folders_table.php`が作成される。<br>
作成されたファイルの`up関数内`でテーブル定義を行う。
```
 public function up()
    {
        Schema::create('folders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 20);
            $table->timestamps();
        });
    }
```
- incrementsメソッド：自動採番
- timestampsメソッド：作成日、更新日を作成

### マイグレーションの実行
cmdで以下コマンドを実行するとテーブルが作成される。
```
$ php artisan migrate
```

## Object-Relationalマッピング（ORM）とは
ORMはアプリケーションからデータベースの操作をしやすくするためのプログラミング手法

## モデルクラス
データの入れ物になるクラス、基本的にはモデルクラス1つがテーブル1つに対応するように作る。<br>
cmdで作成
```
$ php artisan make:model Folder
```
`app`ディレクトリに`Folder`モデルが作成される。<br>
クラスの中身は何も書かなくて良い。継承元であるModelクラスで様々な設定を読み取ってくれる。  
例えばモデルクラスがどのテーブルに対応しているかはクラス名から自動的に推定される。つまりモデルクラスのクラス名の複数形テーブルが対応していると解釈される。  
もしデフォルトの推定に当てはまらない場合は追加で設定が必要。

## Seederでテストデータを挿入する
cmdから作成
```
$ php artisan make:seeder FoldersTableSeeder
```
`database/seeds`ディレクトリに`FoldersTableSeeder.php`が作成される。  
runメソッド内に挿入したいテストデータを記述する。
```
public function run()
    {
        $titles = ['プライベート', '仕事', '旅行'];

        foreach ($titles as $title) {
            DB::table('folders')->insert([
                'title' => $title,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
```
Carbonライブラリを使って現在日時を入れる。  

cmdからシーダーを実行
```
$ composer dump-autoload
$ php artisan db:seed --class=FoldersTableSeeder
```
- composerコマンド：作成したシーダークラスをアプリケーションに認識させるためのもの
db:seedコマンドで「Database seeding completed successfully」と帰ってきたら成功。データが追加されている。


## 詰まった個所
問題： **cssファイルが読み込まれない**  
  
原因：publicフォルダ内にcssを入れてなかった  
解決：public/cssフォルダにcssファイルを配置する  
htmlに記載するパスはpublicから探されるので以下のように記述すれば良い。
```
<link rel="stylesheet" href="/css/styles.css">
```
 [cssが読み込まれなかった時の解決サイト](https://poppotennis.com/posts/laravel-app-404)
***


### 参考サイト
- [環境構築](https://laravel-times.com/index.php/2021/06/06/laravel-tutorial/)
- [todoリストのチュートリアル](https://www.hypertextcandy.com/laravel-tutorial-todo-app-list-folders)
- [cssが読み込まれなかった時の解決サイト](https://poppotennis.com/posts/laravel-app-404)


