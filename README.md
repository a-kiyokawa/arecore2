# Docker x laravel x vite x bootstrap x vue x TypeScript

## 1. docker for windowsをインストールする
https://docs.docker.jp/docker-for-windows/install.html  
https://qiita.com/gahoh/items/7b21377b5c9e3ffddf4a

上記を参考の上

## 2. hostsを設定する
C:\Windows\System32\drivers\etc\hosts  
hostsに「127.0.0.1 arecore2-app」を追記する

## 3. envファイルを作成する
.env.exampleファイルをコピーし、.envに改名する

## 4. Dockerを立ち上げる
##### 4.1. ターミナルを開き、dockerディレクトリへ移動する

##### 4.2. dockerを起動する
docker-compose up -d --build

## 5. Dockerにアクセスし、プロジェクトの初期設定を行う

##### 5.1. dockerへアクセス
docker exec -i -t arecore2_web bash  
↑のコマンドによりDockerにアクセスする

※git bashから実行する場合は下記を実行
wimpty docker exec -i -t arecore2_web bash  

##### 5.2. .envファイルを作成する
cp .env.example .env

##### 5.3. composer install & npm install
composer install
npm install

##### 5.3. Laravelのアプリケーションキーを設定
php artisan key:generate

##### 5.5. ログディレクトリの権限変更
chmod -R 777 storage

##### 5.6. 各種キーを刷新する
php artisan cache:clear  
php artisan config:clear  

##### 5.7. マイグレーションの実施
php artisan migrate --seed

## 6. 稼働確認
以下アドレスへアクセスし、正常にウェブサイトが立ち上がることを確認する  
https://arecore2-app:4433  

## 7. Mysqlクライアントの接続
ホスト: 127.0.0.1  
ユーザ名: arecore2  
パスワード: arecore2  
ポート: 3306  
上記設定にて外部接続可能  


---


### ＜＜＜メモ＞＞＞  
###### ・Dockerを立ち上げる  
docker-compose up -d --build

###### ・DockerのWebコンテナにアクセスする  
winpty docker exec -i -t arecore2_web bash
