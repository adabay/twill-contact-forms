<?php

namespace adabay\TwillContactForms\Twill\Capsules\ContactForms\Http\Controllers;

use A17\Twill\Models\Contracts\TwillModelContract;
use A17\Twill\Services\Listings\Columns\Text;
use A17\Twill\Services\Listings\TableColumns;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Http\Controllers\Admin\ModuleController as BaseModuleController;
use adabay\TwillContactForms\Twill\Capsules\ContactForms\Models\ContactForm;
use App\Models\Page;
use adabay\TwillContactForms\Twill\Capsules\ContactForms\Repositories\ContactFormRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class ContactFormController extends BaseModuleController
{
    protected $moduleName = 'forms';
    /**
     * This method can be used to enable/disable defaults. See setUpController in the docs for available options.
     */
    protected function setUpController(): void
    {
        $this->disablePermalink();
    }

    /**
     * See the table builder docs for more information. If you remove this method you can use the blade files.
     * When using twill:module:make you can specify --bladeForm to use a blade form instead.
     */
    public function getForm(TwillModelContract $model): Form
    {
        $form = parent::getForm($model);

        $form->add(
            Input::make()->name('description')->label('Description')->translatable()
        );

        return $form;
    }

    /**
     * This is an example and can be removed if no modifications are needed to the table.
     */
    protected function additionalIndexTableColumns(): TableColumns
    {
        $table = parent::additionalIndexTableColumns();

        $table->add(
            Text::make()->field('description')->title('Description')
        );

        return $table;
    }

    public function processFormSubmission(Request $request): \Symfony\Component\HttpFoundation\Response
    {
        app()->setLocale($request->input("_locale"));

        if (!$request->input("formId")) {
            throw new BadRequestException();
        }

        $formId = $request->input("formId");
        $formRepository = app(ContactFormRepository::class);
        /* @var ContactForm $form */
        $form = $formRepository->getById($formId);

        if (!$form) {
            throw new BadRequestException();
        }

        $validationRules = [];

        foreach ($form->blocks as $inputBlock) {
            if ($inputBlock->checkbox("required")) {
                $validationRules[$inputBlock->input("id")] = "required";
            }
        }

        $validatedRequestData = $request->validate($validationRules);

        // TODO Process From Data

        /* @var Page | null $successPage */
        $successPage = $form->getFirstRelated("successPage");
        if ($successPage) {
            return response()->redirectToRoute("cms-page", [
                "locale" => app()->getLocale(),
                "slug" => $successPage->getSlug(app()->getLocale())
            ]);
        } else {
            return response()->redirectTo("/");
        }
    }
}
