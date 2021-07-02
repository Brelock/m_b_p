<?php


namespace App\Http\Controllers\Site;

use App\Http\Requests\SubscriberRequest;
use App\Mail\NewRequest;
use App\Models\Admin\Action;
use App\Models\Admin\Link;
use App\Models\Admin\Main\Ability;
use App\Models\Admin\Main\Bail;
use App\Models\Admin\Main\Youget;
use App\Models\Admin\News;
use App\Models\Common\Achievement;
use App\Models\Common\Banner;
use App\Models\Common\Office;
use App\Models\Common\Seo;
use App\Models\Common\Subscriber;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Common\Faq;
use App\Models\Common\FaqCategory;
use App\Models\Common\Feedback;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MainController extends Controller {
  protected $subscriber;

  /**
   * @var Collection
   */
  protected $links;

  /**
   * MainController constructor.
   */
  public function __construct() {
    $this->subscriber = new Subscriber();

    $this->links = new Collection();
  }

  /**
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function index() {
    $meta_tags = Seo::whereAlias('main')->first();
    $banners = Banner::published()->latest()->get();
    $actions = Action::published()->latest()->take(5)->get();
      $all_faqs = Faq::get();
    $news = News::published()->latest()->take(5)->get();
      $feedback = Feedback::latest()->take(10)->get();
    $achievements = Achievement::first();
      $yougets = Youget::all();
    return view('site.main.index-front', [
      'achievements' => $achievements,
      'news' => $news,
      'banners' => $banners,
      'actions' => $actions,
      'meta_tags' => $meta_tags,
      'links' => $this->links,
        'faq' => $all_faqs,
        'feedback' => $feedback,
        'yougets' => $yougets,
    ]);
  }


  /**
   * @param Request $request
   * @return \Illuminate\Http\RedirectResponse
   */
  public function subscribe(Request $request) {
    if (!$this->validEmail($request->email))
      $this->response(['status' => 'error']);

    //save to database and get hash code
    $hash = $this->subscriber->saveSubscriber($request);

    //send confirmation email
    $status = $this->sendEmailConfirmationMessage([
      'email' => $request->email,
      'hash' => $hash
    ]);

    if ($status) {
      //save user to mailchimp service
      $this->subscriber->saveToMailChimp($request->email);

      $this->response(['status' => 'success', 'message' => '']);
    } else
      $this->response(['status' => 'failed']);
  }


  /**
   * @param Request $request
   * save discount subscriber and send email confirmation
   */
  public function discount(Request $request) {
    //save to database
    $hash = $this->subscriber->saveDiscountSubscriber([
      'name' => $request->get('name'),
      'email' => $request->get('email'),
      'phone' => $request->get('phone')
    ]);

    //send confirmation email
    $status = $this->sendEmailConfirmationMessage([
      'email' => $request->get('email'),
      'hash' => $hash,
    ]);

    //response
    if ($status)
      $this->response(['status' => 'success']);
    else
      $this->response(['status' => 'failed']);
  }


  /**
   * @param $data
   * @return bool
   * send email confirmation message
   */
  public function sendEmailConfirmationMessage($data) {
    //email available
    if ($data['hash']) {
      $this->subscriber->sendConfirmationMessage($data['hash'], $data['email']);
      return true;
    }

    return false;
  }


  /**
   * @param $data
   * for ajax responces
   */
  public function response($data) {
    echo json_encode($data);
    exit;
  }


  /**
   * @param $email
   * @return bool
   * email validator
   */
  public function validEmail($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL))
      return true;

    return false;
  }
}