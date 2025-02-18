<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
{
    // appコンテナ内でartisan makeコマンドを使用し作成。
    // php artisan make:request TodoRequest

    // FormRequestクラス（バリデーションを行うクラスの基本となるクラス）を継承している

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // デフォルトはfalse
        // ここがfalseのままだと全てのリクエストを受け付けなくなってしまう
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // rules()には実際のバリデーションルールを指定。
        // required : 入力が必須
        // max:? : 入力された値が指定の文字数以下（?は任意の文字数を指定）
        return [
            'content' => 'required|max:255',
        ];
    }
    
    /**
     * Get the validation messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            // 入力欄のname属性.ルール => メッセージ
            // バリデーションエラーとなった項目が存在した場合、対応するエラーメッセージが自動的にセッションに保存される。
            // セッションに保存されたメッセージは、$errorsというグローバル変数を通してどのBladeからでも取得できる。
            // $errorsの中身：MessageBagクラスのインスタンス
            // $errors->has('入力欄のname属性')で、その入力欄でバリデーションエラーが発生しているか判定。
            // $errors->first('入力欄のname属性')で、その入力欄で最初に発生したエラーメッセージを出力。
            // Q. なぜエラーメッセージを消す処理をしなくていいか？
            // A. セッションは1リクエスト間のみ有効で、その後は自動的に削除されるため。
            'content.required' => 'ToDoが入力されていません。',
            'content.max' => 'ToDoは :max 文字以内で入力してください。',
        ];
    }
}
