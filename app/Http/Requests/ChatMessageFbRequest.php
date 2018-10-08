<?php

namespace CodeShopping\Http\Requests;

use CodeShopping\Models\ChatGroup;
use CodeShopping\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class ChatMessageFbRequest extends FormRequest
{
    public function authorize()
    {
        return $this->groupHasUser() || $this->hasSeller();
    }

    /**
     *
     */
    public function groupHasUser()
    {
        /** @var ChatGroup $chatGroup */
        $chatGroup = $this->route('chat_group');
        $user = \Auth::guard('api')->user();
        return $chatGroup->users()->where('user_id', $user->id)->exists();
    }

    private function hasSeller()
    {
        $user = \Auth::guard('api')->user();
        return $user->role == User::ROLE_SELLER;
    }

    public function rules()
    {
        return [
            'type' => 'required|in:text,audio,image',
            'content' => 'required'
        ];
    }

    protected function getValidatorInstance()
    {
        $validator = parent::getValidatorInstance(); // TODO: Change the autogenerated stub

        $validator->sometimes('content', 'required|string', function($input){
           return $input->type === 'text';
        });

        $validator->sometimes('content', 'required|image:max'.(3 * 2014), function($input){
            return $input->type === 'image';
        });

        return $validator;
    }
}
