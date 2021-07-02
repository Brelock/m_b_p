<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Spatie\TranslationLoader\LanguageLine;

class LanguageLinesTableSeeder extends Seeder {
	/**
	 * Run the database seeds. php artisan db:seed --class=LanguageLinesTableSeeder
	 *
	 * @return void
	 */
	public function run() {
		LanguageLine::truncate();

		/** Common */

		LanguageLine::updateOrCreate([
			'group' => 'common',
			'key' => 'main',
			'text' => [
				'ru' => 'Главная',
				'uk' => 'Головна'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'common',
			'key' => 'calculate',
			'text' => [
				'ru' => 'расчитать',
				'uk' => 'розрахувати'
			],
		]);

		/** Common */

		/** Header */

		LanguageLine::updateOrCreate([
			'group' => 'header',
			'key' => 'for_individuals',
			'text' => [
				'ru' => 'Частным лицам',
				'uk' => 'Приватним особам'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'header',
			'key' => 'for_enterprises',
			'text' => [
				'ru' => 'Предприятиям',
				'uk' => 'Підприємствам'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'header',
			'key' => 'crediting',
			'text' => [
				'ru' => 'Кредитование',
				'uk' => 'Кредитування'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'header',
			'key' => 'about_as',
			'text' => [
				'ru' => 'О нас',
				'uk' => 'Про нас'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'header',
			'key' => 'our_work',
			'text' => [
				'ru' => 'Наши работы',
				'uk' => 'Наші роботи'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'header',
			'key' => 'calculator',
			'text' => [
				'ru' => 'Калькулятор СЭС',
				'uk' => 'Калькулятор СЕС'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'header',
			'key' => 'news',
			'text' => [
				'ru' => 'Новости',
				'uk' => 'Новини'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'header',
			'key' => 'partners',
			'text' => [
				'ru' => 'Партнерам',
				'uk' => 'Партнерам'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'header',
			'key' => 'contacts',
			'text' => [
				'ru' => 'Контакты',
				'uk' => 'Контакти'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'header',
			'key' => 'have_questions',
			'text' => [
				'ru' => 'Есть вопросы',
				'uk' => 'Є питання'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'header',
			'key' => 'building',
			'text' => [
				'ru' => 'Строим Солнечные Электростанции',
				'uk' => 'Будуємо Сонячні Електростанції'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'header',
			'key' => 'key',
			'text' => [
				'ru' => '"Под Ключ"',
				'uk' => '"Під Ключ"'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'header',
			'key' => 'reviews',
			'text' => [
				'ru' => 'Отзывы',
				'uk' => 'Відгуки'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'header',
			'key' => 'insurance',
			'text' => [
				'ru' => 'Страхование',
				'uk' => 'Страхування'
			],
		]);

		/** Header */


		/** Main */

		LanguageLine::updateOrCreate([
			'group' => 'main-page',
			'key' => 'new_arrivals',
			'text' => [
				'ru' => 'Новые поступления',
				'uk' => 'Нові надходження'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'main-page',
			'key' => 'stock_products',
			'text' => [
				'ru' => 'Товары со скидкой',
				'uk' => 'Товари зі знижкою'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'main-page',
			'key' => 'individuals',
			'text' => [
				'ru' => 'Частным лицам',
				'uk' => 'Приватним особам'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'main-page',
			'key' => 'enterprises',
			'text' => [
				'ru' => 'Предприятиям',
				'uk' => 'Підприємствам'
			],
		]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'credit',
      'text' => [
        'ru' => 'Кредитование',
        'uk' => 'Кредитування'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'about',
      'text' => [
        'ru' => 'О нас',
        'uk' => 'Про нас'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'sentence',
      'text' => [
        'ru' => 'Предложение',
        'uk' => 'Пропозиція'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'individuals',
      'text' => [
        'ru' => 'Частным лицам',
        'uk' => 'Приватним особам'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'build',
      'text' => [
        'ru' => 'Мы строим солнечные электростанции на крыше, на земле, а также комбинированные: крыша+земля. Наши клиенты могут рассчитывать на исчерпывающую консультацию, лояльные цены, подключение зеленого тарифа и безупречное качество работы.',
        'uk' => 'Ми будуємо сонячні електростанції на даху, на землі, а також комбіновані: дах + земля. Наші клієнти можуть розраховувати на вичерпну консультацію, лояльні ціни, підключення зеленого тарифу і бездоганну якість роботи.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'enterprises',
      'text' => [
        'ru' => 'Предприятиям',
        'uk' => 'Підприємствам'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'develops',
      'text' => [
        'ru' => 'Мир не стоит на месте, он развивается, а вместе с ним растут и тарифы на электроэнергию. Ждать пока их аппетиты станут соразмерными с бюджетом вашей фирмы или решить эту проблему сейчас, чтобы в будущем ваш бизнес рос и процветал. Наша компания предлагает установить солнечную электростанцию на территории Вашего предприятия, которая существенно сократит, а в солнечные дни полностью освободит вас от потребления из электросети и платы за электроэнергию в дневное время суток на десятилетия вперед.',
        'uk' => 'Світ не стоїть на місці, він розвивається, а разом з ним ростуть і тарифи на електроенергію. Чекати поки їх апетити стануть пропорційними з бюджетом вашої фірми або вирішити цю проблему зараз, щоб в майбутньому ваш бізнес ріс і процвітав. Наша компанія пропонує встановити сонячну електростанцію на території Вашого підприємства, яка істотно скоротить, а в сонячні дні повністю звільнить вас від споживання з електромережі і плати за електроенергію в денний час доби на десятиліття вперед.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'lending',
      'text' => [
        'ru' => 'Кредитование',
        'uk' => 'Кредитування'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'get_loan',
      'text' => [
        'ru' => 'С нами вы можете получить кредит на солнечную электростанцию в Украине и получить «Зеленый» тариф, ежемесячных выплат с которого будет достаточно для внесения ежемесячных кредитных платежей.',
        'uk' => 'З нами ви можете отримати кредит на сонячну електростанцію в Україні і отримати «Зелений» тариф, щомісячних виплат з якого буде достатньо для внесення щомісячних кредитних платежів.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'our_reach',
      'text' => [
        'ru' => 'Наш охват',
        'uk' => 'Наш охват'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'map',
      'text' => [
        'ru' => 'ESS на карте Украины',
        'uk' => 'ESS на карті України'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'we_map',
      'text' => [
        'ru' => 'мы на карте',
        'uk' => 'ми на карті'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'projects',
      'text' => [
        'ru' => 'Смотреть все наши работы',
        'uk' => 'Дивитися всі наші роботи'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'experience',
      'text' => [
        'ru' => 'Опыт работы компании ESS включает в себя строительство солнечных электростанций в Украине и Европе. Европейский опыт строительства СЭС мы с успехом воплощаем в своей работе на территории нашей Родины.',
        'uk' => 'Досвід роботи компанії ESS включає в себе будівництво сонячних електростанцій в Україні та Європі. Європейський досвід будівництва СЕС ми з успіхом втілюємо в своїй роботі на території нашої Батьківщини.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'region',
      'text' => [
        'ru' => 'Регион',
        'uk' => 'Регіон'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'rog',
      'text' => [
        'ru' => 'Кривой Рог',
        'uk' => 'Кривий Ріг'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'installed',
      'text' => [
        'ru' => 'Установленная мощность в регионе',
        'uk' => 'Встановлена потужність в регіоні'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'energosave_company',
      'text' => [
        'ru' => 'Компания ENERGOSAVE SYSTEMS - это исключительно иновационные методы производства и сохранения энергии. Мы являемся официальным диллером компании №1 в мире на рынке солнечных панелей.',
        'uk' => 'Компанія ENERGOSAVE SYSTEMS – це виключно інноваційні методи виробництва та збереження енергії. Ми є офіційним дилером компанії №1 у світі у галузі сонячних технологій.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'team',
      'text' => [
        'ru' => 'Наша команда - это высококвалифицированные специалисты. Доказательством нашего опыта могут быть только наши результаты. Мы пропагандируем честные и прозрачные цены, которые не будут меняться в период от телефонного разговора до встречи с нами.',
        'uk' => 'Наша команда – це кваліфіковані спеціалісти. Доказами нашого досвіду можуть бути тільки наші результати. Ми пропагуємо достовірні і прозорі ціни, котрі не будуть змінюватися в період від телефонної розмови до зустрічі з нами.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'more',
      'text' => [
        'ru' => 'подробнее',
        'uk' => 'детальніше'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'why',
      'text' => [
        'ru' => 'Почему сейчас?',
        'uk' => 'Чому зараз?'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'green_tariff',
      'text' => [
        'ru' => '«Зеленый» тариф',
        'uk' => '«Зелений» тариф'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'green',
      'text' => [
        'ru' => 'Зеленый',
        'uk' => 'Зелений'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'will_act',
      'text' => [
        'ru' => '«Зеленый» тариф будет действовать до конца 2029 года, после стоимость «Зеленого» тарифа будет равна стоимости электроэнергии для потребителя',
        'uk' => '«Зелений» тариф буде діяти до кінця 2029 року, після вартість «Зеленого» тарифу буде дорівнює вартості електроенергії для споживача'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'green_rates',
      'text' => [
        'ru' => 'Зеленые тарифы в Украине',
        'uk' => 'Зелені тарифи в Україні'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'cost',
      'text' => [
        'ru' => 'Стоимость за 1 кВт-ч, ЕВРО без НДС*',
        'uk' => 'Вартість за 1 кВт-год, ЄВРО без ПДВ*'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'source_type',
      'text' => [
        'ru' => 'Вид источника',
        'uk' => 'Вид джерела'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'ground',
      'text' => [
        'ru' => 'Промышленная СЭС (наземная)',
        'uk' => 'Промислова СЕС (наземна)'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'rooftop',
      'text' => [
        'ru' => 'Промышленная СЭС (крышная)',
        'uk' => 'Промислова СЕС (дахова)'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'private',
      'text' => [
        'ru' => 'Частная солнечная электростанция',
        'uk' => 'Приватна сонячна електростанція'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'earn',
      'text' => [
        'ru' => 'Заработайте до конца 2029 года',
        'uk' => 'Заробіть до кінця 2029 року'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'install',
      'text' => [
        'ru' => '*если установите СЭС 30 кВт уже сейчас',
        'uk' => '*якщо поставите СЕС 30 кВт вже зараз'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'submit',
      'text' => [
        'ru' => 'Подать заявку',
        'uk' => 'Подати заявку'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'best',
      'text' => [
        'ru' => 'Лучшие в Украине',
        'uk' => 'Кращі в Україні'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'krivoy_rog',
      'text' => [
        'ru' => 'Кривой Рог',
        'uk' => 'Кривий Ріг'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'dnieper',
      'text' => [
        'ru' => 'Днепр',
        'uk' => 'Дніпро'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'zapor',
      'text' => [
        'ru' => 'Запорожье',
        'uk' => 'Запоріжжя'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'berd',
      'text' => [
        'ru' => 'Бердянск',
        'uk' => 'Бердянськ'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'odessa',
      'text' => [
        'ru' => 'Одесса',
        'uk' => 'Одеса'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'poltava',
      'text' => [
        'ru' => 'Полтава',
        'uk' => 'Полтава'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'kiev',
      'text' => [
        'ru' => 'Киев',
        'uk' => 'Київ'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'tern',
      'text' => [
        'ru' => 'Тернополь',
        'uk' => 'Тернопіль'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'vinnyt',
      'text' => [
        'ru' => 'Винница',
        'uk' => 'Вінниця'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'kherson',
      'text' => [
        'ru' => 'Херсон',
        'uk' => 'Херсон'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'questions',
      'text' => [
        'ru' => 'Есть вопросы',
        'uk' => 'Є питання'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'portfolio',
      'text' => [
        'ru' => 'Портфолио',
        'uk' => 'Портфоліо'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'our_work',
      'text' => [
        'ru' => 'Наши работы',
        'uk' => 'Наші роботи'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => '30_years',
      'text' => [
        'ru' => 'Солнечные панели Sunport с уникальной технологией MWT и 30-летней гарантией на генерацию.',
        'uk' => 'Сонячні панелі Sunport з унікальною технологією MWT і 30-річною гарантією на генерацію.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'energosave_systems',
      'text' => [
        'ru' => 'ENERGOSAVE SYSTEMS',
        'uk' => 'ENERGOSAVE SYSTEMS'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'sunpower',
      'text' => [
        'ru' => 'Sunpower',
        'uk' => 'Sunpower'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'sunpower2',
      'text' => [
        'ru' => 'Sunpower',
        'uk' => 'Sunpower'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'sunport',
      'text' => [
        'ru' => 'Sunport',
        'uk' => 'Sunport'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'sunport2',
      'text' => [
        'ru' => 'Sunport',
        'uk' => 'Sunport'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'sunport_power',
      'text' => [
        'ru' => 'Sunport Power',
        'uk' => 'Sunport Power'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'kness',
      'text' => [
        'ru' => 'KNESS',
        'uk' => 'KNESS'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-page',
      'key' => 'kness2',
      'text' => [
        'ru' => 'KNESS',
        'uk' => 'KNESS'
      ],
    ]);

    /** Main */

		/** 404 */

		LanguageLine::updateOrCreate([
			'group' => 'page-404',
			'key' => 'page_was_not_found',
			'text' => [
				'ru' => 'Ваша страница не найдена',
				'uk' => 'Ваша сторінка не знайдена'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'page-404',
			'key' => 'on_main',
			'text' => [
				'ru' => 'на главную',
				'uk' => 'на головну'
			],
		]);

		/** 404 */

		/** Contact footer */

		LanguageLine::updateOrCreate([
			'group' => 'contact-footer',
			'key' => 'mailing_address',
			'text' => [
				'ru' => 'Почтовый адрес',
				'uk' => 'Поштова адреса'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'contact-footer',
			'key' => 'address',
			'text' => [
				'ru' => 'Адрес:',
				'uk' => 'Адреса:'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'contact-footer',
			'key' => 'dnipropetrovsk_region',
			'text' => [
				'ru' => 'Днепропетровская область',
				'uk' => 'Дніпропетровська область'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'contact-footer',
			'key' => 'krivoy_rog',
			'text' => [
				'ru' => 'Кривой Рог',
				'uk' => 'Кривий Ріг'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'contact-footer',
			'key' => 'str_volgogradskaya',
			'text' => [
				'ru' => 'ул. Волгоградская, 4',
				'uk' => 'вул. Волгоградська, 4'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'contact-footer',
			'key' => 'kiev',
			'text' => [
				'ru' => 'Киев',
				'uk' => 'Київ'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'contact-footer',
			'key' => 'str_berezneva_10',
			'text' => [
				'ru' => 'ул. Березнева, 10 (р-н Дарницкой пл.)',
				'uk' => 'вул. Березнева, 10 (р-н Дарницької пл.)'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'contact-footer',
			'key' => 'sales_department',
			'text' => [
				'ru' => 'Отдел продаж',
				'uk' => 'Відділ продажів'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'contact-footer',
			'key' => 'str_volgogradskaya_4',
			'text' => [
				'ru' => 'ул. Волгоградская, 4 (р-н 95 квартала.)',
				'uk' => 'вул. Волгоградська, 4 (р-н 95 кварталу.)'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'contact-footer',
			'key' => 'accounting_tender_department',
			'text' => [
				'ru' => 'Бухгалтерия/Тендерный отдел',
				'uk' => 'Бухгалтерія/Тендерний відділ'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'contact-footer',
			'key' => 'galina_aleksandrovna',
			'text' => [
				'ru' => 'Галина Александровна',
				'uk' => 'Галина Олександрівна'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'contact-footer',
			'key' => 'director',
			'text' => [
				'ru' => 'Директор',
				'uk' => 'Директор'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'contact-footer',
			'key' => 'aleksey_aleksandrovich',
			'text' => [
				'ru' => 'Алексей Александрович',
				'uk' => 'Олексій Олександрович'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'contact-footer',
			'key' => 'social_networks',
			'text' => [
				'ru' => 'Социальные сети',
				'uk' => 'Соцiальнi мережi'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'contact-footer',
			'key' => 'protected',
			'text' => [
				'ru' => '@ 2020 Все права защищены.',
				'uk' => '@ 2020 Всі права захищені.'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'contact-footer',
			'key' => 'designed',
			'text' => [
        'ru' => 'Разработано в',
        'uk' => 'Розроблено в'
			],
		]);

		/** Contact footer */

		/** Credit */

		LanguageLine::updateOrCreate([
			'group' => 'credit',
			'key' => 'green_tariff_will_cover_the_loan',
			'text' => [
				'ru' => 'Зеленый тариф покроет кредит!',
				'uk' => 'Зелений тариф погасить кредит!'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'credit',
			'key' => 'ess_offers_a_comfortable_loan_solution',
			'text' => [
				'ru' => 'Компания ESS предлагает владельцам домовладений комфортное кредитное решение на покупку оборудования для солнечных электростанций.',
				'uk' => 'Компанія ESS пропонує власникам домогосподарств комфортне кредитне рішення на придбання обладнання для сонячних електростанцій.'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'credit',
			'key' => 'with_us_you_can_get_a_loan_for_solar_power_plant',
			'text' => [
				'ru' => 'С нами вы можете получить кредит на солнечную электростанцию в Украине и получить «Зеленый» тариф, ежемесячных выплат с которого будет достаточно для внесения ежемесячных кредитных платежей. Это и есть главное преимущество кредитов на солнечные электростанции в Украине.',
				'uk' => 'З нами ви можете отримати кредит на сонячну електростанцію в Україні і отримати «Зелений» тариф, щомісячних виплат з якого буде достатньо для внесення щомісячних кредитних платежів. Це і є головна перевага отримання кредитів на сонячні електростанції в Україні.'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'credit',
			'key' => 'we_are_accredited_in_the_following_banks',
			'text' => [
				'ru' => 'Мы акредитованы в таких банках:',
				'uk' => 'Ми акредитовані в таких банках:'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'credit',
			'key' => 'solar_power_plants_in_credit',
			'text' => [
				'ru' => 'Солнечные электростанции в кредит',
				'uk' => 'Сонячні електростанції в кредит'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'credit',
			'key' => 'why_a_credit',
			'text' => [
				'ru' => 'Почему кредит?',
				'uk' => 'Чому кредит?'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'credit',
			'key' => 'obtaining_a_loan_to_invest_in_an_asset',
			'text' => [
				'ru' => 'Получение кредита для инвестирования в актив, которым является СЭС – разумное решение для новых возможностей Вашей жизни и развития. Потому что, кредит на солнечную электростанцию равен инвестиции в развитие вашей семьи. Ведь солнечная электростанция с «Зеленым» тарифом – это семейный бизнес «под ключ», который будет работать на вас десятки лет, не закрываясь на «Карантин» и вопреки влиянию прочих факторов, которые воздействуют на нас.',
				'uk' => 'Отримання кредиту для інвестування у актив, яким є мережева СЕС-розумне рішення для нових можливостей Вашого життя та розвитку. Тому що, кредит на сонячну електростанцію дорівнює інвестиції у розвиток вашої родини. Бо сонячна електростанція з «Зеленим» тарифом - це сімейний бізнес «під ключ», який працюватиме на вас десятки років, не закриваючись на «Карантин» і незважаючи на інші фактори, що мають вплив на нас.'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'credit',
			'key' => 'loan_terms',
			'text' => [
				'ru' => 'Срок кредитования',
				'uk' => 'Термін кредиту'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'credit',
			'key' => 'up_to_5_years',
			'text' => [
				'ru' => 'до 5 лет',
				'uk' => 'до 5 років'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'credit',
			'key' => 'first_installment',
			'text' => [
				'ru' => 'Первый взнос',
				'uk' => 'Перший внесок'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'credit',
			'key' => 'from_15%_of_the_cost',
			'text' => [
				'ru' => 'от 15% стоимости СЭС',
				'uk' => 'вiд 15% вартостi СЕС'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'credit',
			'key' => 'interest_rate',
			'text' => [
				'ru' => 'Процентная ставка',
				'uk' => 'Відсоткова ставка'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'credit',
			'key' => 'from_4.19%_per',
			'text' => [
				'ru' => 'от 4,19% годовых в грн',
				'uk' => 'від 4,19% річних в грн'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'credit',
			'key' => 'getting_a_loan_is_easy',
			'text' => [
				'ru' => 'Получить кредит легко!',
				'uk' => 'Отримати кредит легко!'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'credit',
			'key' => 'getting_a_loan_is_easy_2',
			'text' => [
				'ru' => 'Получить кредит легко!',
				'uk' => 'Отримати кредит легко!'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'credit',
			'key' => 'this_requires_the_following_documents',
			'text' => [
				'ru' => 'Для этого необходимы такие документы:',
				'uk' => 'Для цього необхідні лише такі документи:'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'credit',
			'key' => 'ukrainian_passport',
			'text' => [
				'ru' => 'паспорт гражданина Украины',
				'uk' => 'паспорт громадянина України'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'credit',
			'key' => 'identification_code',
			'text' => [
				'ru' => 'идентификационный код',
				'uk' => 'iдентифікаційний персональний номер (ІПН)'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'credit',
			'key' => 'certificate_of_income_for_the_last_six_months',
			'text' => [
				'ru' => 'свидетельство о доходах за последние полгода (или 3 месяца, если вы работаете менее 6 месяцев)',
				'uk' => 'довідка про доходи за останні півроку (або 3 місяці)'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'credit',
			'key' => 'marriage_certificate',
			'text' => [
				'ru' => 'свидетельство о браке (если вы состоите в браке) и согласие от мужа/жены',
				'uk' => 'свідоцтво про шлюб (якщо ви у шлюбі)та згода від чоловіка/дружини'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'credit',
			'key' => 'solar_power_plant_insurance',
			'text' => [
				'ru' => 'Страхование солнечных электростанций: Солнечная станция в кредит подлежит обязательному страхованию!',
				'uk' => 'Страхування сонячних електростанцій: Сонячна електростанція в кредит підлягає обов`язковому страхуванню!'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'credit',
			'key' => 'general_loan_conditions',
			'text' => [
				'ru' => 'Общие условия кредитования:',
				'uk' => 'Загальні умови кредитування:'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'credit',
			'key' => 'type',
			'text' => [
				'ru' => 'Тип',
				'uk' => 'Тип'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'credit',
			'key' => 'credit',
			'text' => [
				'ru' => 'кредита',
				'uk' => 'кредиту'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'credit',
			'key' => 'custom_credit',
			'text' => [
				'ru' => 'Пользовательский кредит',
				'uk' => 'Споживчий кредит'
			],
		]);

		LanguageLine::updateOrCreate([
			'group' => 'credit',
			'key' => 'for_up_to_5_years',
			'text' => [
				'ru' => 'Пользовательский кредит На срок до 5 лет (включительно) и на сумму: от 1000,00 до 1 000 000,00 (включительно) – на получение и установку солнечной станции',
				'uk' => 'На термін до 5 років (включно) і на суму: від 1 000,00 по 1 000 000,00 (включно) — на придбання та встановлення сонячної станції'
			],
		]);

    LanguageLine::updateOrCreate([
      'group' => 'credit',
      'key' => 'goal',
      'text' => [
        'ru' => 'Цель',
        'uk' => 'Мета'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'credit',
      'key' => 'obtaining_a_loan',
      'text' => [
        'ru' => 'получения кредита',
        'uk' => 'отримання кредиту'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'credit',
      'key' => 'for_the_purchase_and_installation',
      'text' => [
        'ru' => 'На покупку и установку солнечной станции, а именно на:',
        'uk' => 'На придбання та встановлення сонячної cтанції, а саме на:'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'credit',
      'key' => 'purchase_of_equipment',
      'text' => [
        'ru' => 'покупку оборудования;',
        'uk' => 'придбання обладнання;'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'credit',
      'key' => 'consumables',
      'text' => [
        'ru' => 'расходные материалы;',
        'uk' => 'витратні матеріали;'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'credit',
      'key' => 'design_and_installation_work',
      'text' => [
        'ru' => 'проектно монтажные работы',
        'uk' => 'проектно-монтажні роботи'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'credit',
      'key' => 'at_condition_of_equipment_purchase',
      'text' => [
        'ru' => '(при условии покупки оборудования);',
        'uk' => '(за умови придбання обладнання);'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'credit',
      'key' => 'way',
      'text' => [
        'ru' => 'Способ',
        'uk' => 'Спосіб'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'credit',
      'key' => 'granting_a_loan',
      'text' => [
        'ru' => 'предоставления кредита',
        'uk' => 'надання кредиту'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'credit',
      'key' => 'loans_are_provided',
      'text' => [
        'ru' => 'Кредиты предоставляются путем безналичного перевода кредитных средств на текущий счет Заемщика открытый в Банке.',
        'uk' => 'Кредити надаються шляхом безготівкового перерахування кредитних коштів на поточний рахунок Позичальника, відкритий в Банку.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'credit',
      'key' => 'more_detailed_information',
      'text' => [
        'ru' => 'Более детальную информацию можна прочитать в Паспорте кредитования:',
        'uk' => 'Більш детальну інформацію можна прочитати у Паспорті кредитування:'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'credit',
      'key' => 'download',
      'text' => [
        'ru' => 'Загрузить',
        'uk' => 'Завантажити'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'credit',
      'key' => 'without',
      'text' => [
        'ru' => 'Без',
        'uk' => 'Без'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'credit',
      'key' => 'collateral',
      'text' => [
        'ru' => 'залога',
        'uk' => 'застави'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'credit',
      'key' => 'the_collateral_value_is_set',
      'text' => [
        'ru' => 'Стоимость залога устанавливается в размере стоимости оборудования / материалов, согласно счета-фактуры или договора на приобретение и установку СЭС',
        'uk' => 'Вартість застави встановлюється у розмірі вартості обладнання/матеріалів, згідно рахунку-фактури або договору на придбання та встановлення СЕС'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'credit',
      'key' => 'loan_repayment',
      'text' => [
        'ru' => 'Погашение кредита',
        'uk' => 'Погашення кредиту'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'credit',
      'key' => 'equal_payments',
      'text' => [
        'ru' => 'равными платежами',
        'uk' => 'рiвними платежами'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'credit',
      'key' => 'cash',
      'text' => [
        'ru' => 'Погашение кредита равными платежами Внесение наличных в кассу АБ «УКРГАЗБАНК», безналичного перевода средств клиентом (доверенным лицом) с текущих счетов договорного списания с текущих счетов Заемщика (в том числе операции с использованием электронных платежных средств), открытых в АБ «УКРГАЗБАНК».',
        'uk' => 'Погашення кредиту рiвними платежами Внесення готiвки в касу АБ “УКРГАЗБАНК”, безготiвкового перерахування коштiв клiєнтом (довiреною особою) з поточних рахункiв договiрного списання з поточних рахункiв Позичальника (у тому числi операцiї з використанням електроних платiжних засобiв), вiдкритих в АБ “УКРГАЗБАНК”.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'credit',
      'key' => 'no_commission',
      'text' => [
        'ru' => 'Без комиссии',
        'uk' => 'Без комiсiї'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'credit',
      'key' => 'upon_loan_repayment',
      'text' => [
        'ru' => 'при погашении кредита',
        'uk' => 'при погашеннi кредиту'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'credit',
      'key' => 'when_depositing_cash',
      'text' => [
        'ru' => 'При внесении наличных средств в кассу АБ «УКРАГАЗБАНК»/перевод безналичных средств с текущих счетов, открытых в АБ «УКРГАЗБАНК», для погашения кредитной задолженности – комиссия не взимается.',
        'uk' => 'При внесеннi готiвкових коштiв в касу АБ “УКРГАЗБАНК”/перерахування безготiвкових коштiв з поточних рахункiв, вiдкритих в АБ “УКРГАЗБАНК”, для погашення кредитної заборгованностi — комiсiя не застосовується.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'credit',
      'key' => 'calculate',
      'text' => [
        'ru' => 'Рассчитать',
        'uk' => 'Розрахувати'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'credit',
      'key' => 'we_offer_ready-made_solutions',
      'text' => [
        'ru' => 'Предлагаем готовые решения под ключ',
        'uk' => 'Пропонуємо готові рішення під ключ'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'credit',
      'key' => 'turnkey_solutions',
      'text' => [
        'ru' => 'решения под ключ',
        'uk' => 'рішення під ключ'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'credit',
      'key' => 'solar_power_plant_kit',
      'text' => [
        'ru' => 'Комплект солнечной электростанции',
        'uk' => 'Комплект сонячної електростанції'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'credit',
      'key' => 'you_can_also_buy_from_us',
      'text' => [
        'ru' => 'Также у нас вы можете приобрести в кредит комплектующие для строительства солнечной электростанции:',
        'uk' => 'Також у нас ви можете придбати в кредит комплектуючі для будівництва сонячної електростанції:'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'credit',
      'key' => 'on-grid_inverter',
      'text' => [
        'ru' => 'Сетевой инвертор',
        'uk' => 'Мережевий інвертор'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'credit',
      'key' => 'hybrid_inverter',
      'text' => [
        'ru' => 'Гибридный инвертор',
        'uk' => 'Гібридний інвертор'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'credit',
      'key' => 'solar_panels',
      'text' => [
        'ru' => 'Солнечные панели',
        'uk' => 'Сонячні панелі'
      ],
    ]);


		/** Credit */

    /** Partner */

    LanguageLine::updateOrCreate([
      'group' => 'partner',
      'key' => 'partner',
      'text' => [
        'ru' => 'Партнерам',
        'uk' => 'Партнерам'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'partner',
      'key' => 'work_with_the_best',
      'text' => [
        'ru' => 'Работай с лучшими – достигай большего!',
        'uk' => 'Працюй з кращими — досягай більшого!'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'partner',
      'key' => 'official_distributor_of_SunPower',
      'text' => [
        'ru' => 'Компания ESS – официальный дистрибьютор компании SUNPOWER. Мы гарантируем клиентам совершенное качество солнечных панелей, а партнерам – испытанный товар с высокой маржинальностью.',
        'uk' => "Компанія ESS є офіційним дистриб'ютором компанії SUNPOWER. Ми гарантуємо клієнтам досконалу якість сонячних панелей, а партнерам - випробуваний товар з високою маржинальністю."
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'partner',
      'key' => 'we_believe_in_a_better_future',
      'text' => [
        'ru' => 'Мы верим в лучшее будущее, потому что имеем лучший продукт для его создания. Если вы разделяете наши ценности, то мы будем рады видеть вас среди наших партнеров.',
        'uk' => 'Ми віримо у краще майбутнє, бо маємо найкращий продукт для його створення. Якщо ви розділяєте наші цінности, то ласкаво просимо до партнерства.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'partner',
      'key' => 'become_a_partner',
      'text' => [
        'ru' => 'Стать партнером',
        'uk' => 'Стати партнером'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'partner',
      'key' => 'we_offer_two_types_of_partnership',
      'text' => [
        'ru' => 'Предлагаем два вида партнерства:',
        'uk' => 'Пропонуємо два види партнерства:'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'partner',
      'key' => 'two_kinds_of_partnership',
      'text' => [
        'ru' => 'два види партнерства:',
        'uk' => 'два види партнерства:'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'partner',
      'key' => 'for_shops_and_installers',
      'text' => [
        'ru' => 'Для магазинов и монтажных организаций',
        'uk' => 'Для магазинів і монтажних організацій'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'partner',
      'key' => 'bulk_prices',
      'text' => [
        'ru' => 'оптовые цены',
        'uk' => 'оптові ціни'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'partner',
      'key' => 'what_do_you_get',
      'text' => [
        'ru' => 'Что вы получите:',
        'uk' => 'Що ви отримаєте:'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'partner',
      'key' => 'high-margin_product',
      'text' => [
        'ru' => 'Товар с высокой маржинальностью',
        'uk' => 'Товар з високою маржинальністю'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'partner',
      'key' => 'best_guaranteed_product',
      'text' => [
        'ru' => 'Товар с самой лучшей гарантией в отрасли – 25 лет',
        'uk' => 'Товар з найкращою гарантією у галузі - 25 років'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'partner',
      'key' => 'premium_product',
      'text' => [
        'ru' => 'Премиальный продукт, проверенный временем и крупнейшими мировыми корпорациями – 35 лет на рынке, среди клиентов NASA, Apple, Toyota, Google',
        'uk' => 'Преміальний продукт, перевіренний часом і топовими компаніями світу - 35 років на ринку, серед клієнтів NASA, Apple, Toyota, Google'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'partner',
      'key' => 'the_ability_to_give_the_client',
      'text' => [
        'ru' => 'Способность дать клиенту то, чего он действительно желает',
        'uk' => 'Спроможність дати клієнту те, чого він дійсно бажає'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'partner',
      'key' => 'information_and_marketing_support',
      'text' => [
        'ru' => 'Информационную и маркетинговую поддержку – уникальные медиа материалы нашего производства, переведенные с английского на украинский/русский язык',
        'uk' => 'Інформаційну та маркетингову підтримку - унікальні медіа матеріали нашого виробницства, перекладені з англійської на українську мову'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'partner',
      'key' => 'print_advertisements',
      'text' => [
        'ru' => 'Печатную рекламу в виде брошюр',
        'uk' => 'Печатну рекламу у вигляді брошюр'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'partner',
      'key' => 'for_individuals',
      'text' => [
        'ru' => 'Для частных лиц',
        'uk' => 'Для приватних осіб'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'partner',
      'key' => 'referral_system',
      'text' => [
        'ru' => 'реферальная система',
        'uk' => 'реферальна система'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'partner',
      'key' => 'we_are_now_addressing',
      'text' => [
        'ru' => 'Сейчас мы обращаемся в первую очередь к нашим клиентам, которым мы уже построили электростанцию:',
        'uk' => 'Зараз ми звертаємося в першу чергу до наших клієнтів, яким ми вже побудували електростанцію:'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'partner',
      'key' => 'you_know_us_personally',
      'text' => [
        'ru' => 'Вы знаете нас лично, Вы знаете, как мы работаем и Вам будет приятно порекомендовать нашу компанию людям, которые хотят построить СЭС на участке, на крыше дома, магазина и т.д.',
        'uk' => 'Ви знаєте нас особисто, Ви знаєте, як ми працюємо і Вам буде приємно порекомендувати нашу компанію людям, які хочуть побудувати СЕС у себе на ділянці, на даху магазину і т.д.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'partner',
      'key' => 'do_you_recommend_us',
      'text' => [
        'ru' => 'Вы рекомендуете нас другим, ми награждаем Вас процентом от сделки:',
        'uk' => 'Ви рекомендуєте нас іншим, ми винагороджуємо Вас відсотком від угоди:'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'partner',
      'key' => 'for_1_station',
      'text' => [
        'ru' => 'За 1 станцию 1%',
        'uk' => 'За 1 станцію 1%'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'partner',
      'key' => 'in_this_case_your_friend_will_receive',
      'text' => [
        'ru' => 'При этом Ваш друг получит дополнительные скидки на оборудование для СЭС, что делает наше предложение привлекательным для всех сторон. Кроме того, это сократит срок окупаемости именно Вашей СЭС, так как с каждого приведенного Вами друга мы возвращаем Вам деньги, которые Вы инвестировали в покупку оборудования.',
        'uk' => 'При цьому Ваш друг отримає додаткові знижки на обладнання для СЕС, що робить нашу пропозицію привабливою для всіх сторін. Крім того, це скоротить термін окупності саме Вашої СЕС, так як з кожного приведеного Вами друга ми повертаємо Вам гроші, які Ви інвестували в покупку устаткування.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'partner',
      'key' => 'client',
      'text' => [
        'ru' => 'Стать клиентом',
        'uk' => 'Cтати клієнтом'
      ],
    ]);

    /** Partner */

    /** Discussion form */

    LanguageLine::updateOrCreate([
      'group' => 'discussion-form',
      'key' => 'want_to_discuss',
      'text' => [
        'ru' => 'Хотите обсудить ваш будущий проект?',
        'uk' => 'Бажаєте обговорити ваш майбутній проект?'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'discussion-form',
      'key' => 'your_name_surname',
      'text' => [
        'ru' => 'Ваше ФИО',
        'uk' => 'Ваше ПІБ'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'discussion-form',
      'key' => 'the_same_as_in_the_agreement_with_the_RES',
      'text' => [
        'ru' => '(также как в договре с РЭС)',
        'uk' => '(так само, як у договорі з РЕС)'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'discussion-form',
      'key' => 'agreement_with_RES',
      'text' => [
        'ru' => 'Договор с РЭС',
        'uk' => 'Договір з РЕС'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'discussion-form',
      'key' => 'data',
      'text' => [
        'ru' => '(№, дата)',
        'uk' => '(№, дата)'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'discussion-form',
      'key' => 'your_phone_number',
      'text' => [
        'ru' => 'Ваш телефон',
        'uk' => 'Ваш телефон'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'discussion-form',
      'key' => 'your_number_will_be_used',
      'text' => [
        'ru' => '(Ваш номер будет использован только для обработки данного заказа)',
        'uk' => '(Ваш номер буде використано тільки для обробки цього замовлення)'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'discussion-form',
      'key' => 'your_e-mail',
      'text' => [
        'ru' => 'Ваш e-mail',
        'uk' => 'Ваш e-mail'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'discussion-form',
      'key' => 'station_power',
      'text' => [
        'ru' => 'Мощность станции (кВт)',
        'uk' => 'Потужність станції (кВт)'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'discussion-form',
      'key' => 'loan_terms',
      'text' => [
        'ru' => 'Срок кредитования (лет)',
        'uk' => 'Термін кредиту (років)'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'discussion-form',
      'key' => 'locality',
      'text' => [
        'ru' => 'Населенный пункт',
        'uk' => 'Населений пункт'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'discussion-form',
      'key' => 'i_agree',
      'text' => [
        'ru' => 'Я соглашаюсь с',
        'uk' => 'Я погоджуюсь з'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'discussion-form',
      'key' => 'user_agreement',
      'text' => [
        'ru' => 'пользовательским соглашением',
        'uk' => 'угодою користувача'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'discussion-form',
      'key' => 'and',
      'text' => [
        'ru' => 'и',
        'uk' => 'та'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'discussion-form',
      'key' => 'privacy_policy',
      'text' => [
        'ru' => 'политикой конфиденциальности',
        'uk' => 'політикою конфіденційності'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'discussion-form',
      'key' => 'submit',
      'text' => [
        'ru' => 'отправить',
        'uk' => 'надіслати'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'discussion-form',
      'key' => 'whole_field',
      'text' => [
        'ru' => 'Необходимо заполнить это поле',
        'uk' => 'Необхідно заповнити це поле'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'discussion-form',
      'key' => 'valid_email',
      'text' => [
        'ru' => 'Необходимо ввести правильный email',
        'uk' => 'Необхідно ввести правильний email'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'discussion-form',
      'key' => 'needed_your',
      'text' => [
        'ru' => 'Необходимо ваше согласие',
        'uk' => 'Необхідно вашу згоду'
      ],
    ]);

    /** Discussion form */


    /** Company */

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'energy_of_sun',
      'text' => [
        'ru' => 'Энергия Солнца для Собственного Потребления',
        'uk' => 'Енергія Сонця для Власного Споживання'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'electricity_bills',
      'text' => [
        'ru' => 'Счета за электроэнергию теперь не будут влиять на прибыль от вашего бизнеса!',
        'uk' => 'Рахунки за електроенергію тепер не будуть впливати на прибуток від власного бізнесу!'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'fix_your_energy_rate',
      'text' => [
        'ru' => 'Зафиксируйте свой энерготариф на уровне:',
        'uk' => 'Зафіксуйте свій енерготариф на рівні:'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => '0.65',
      'text' => [
        'ru' => '0.65 грн',
        'uk' => '0.65 грн'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'kWh',
      'text' => [
        'ru' => 'кВт.час',
        'uk' => 'кВт.год'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'until_2045',
      'text' => [
        'ru' => 'до 2045',
        'uk' => 'до 2045'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'of_the_year',
      'text' => [
        'ru' => 'года',
        'uk' => 'року'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'fixed_tarif',
      'text' => [
        'ru' => 'зафиксировать',
        'uk' => 'зафіксувати'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'buy_payment',
      'text' => [
        'ru' => 'заказать расчет',
        'uk' => 'замовити розрахунок'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'and_decide_today',
      'text' => [
        'ru' => 'И решите сегодня все энергопроблемы собственного бизнеса, которые ждут всех (в т.ч. конкурирующие с вами) предприятия в будущем',
        'uk' => 'Та вирішіть вже сьогодні всі енергопроблеми власного бізнесу, які чекають на всі (в т.ч. конкуруючі з вами) підприємства в майбутньому'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'solve_all_energy_problems',
      'text' => [
        'ru' => 'решите все енергопроблемы',
        'uk' => 'вирішіть всі енергопроблеми'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'get_enough_power',
      'text' => [
        'ru' => 'Получите достаточно мощности для расширения бизнеса',
        'uk' => 'Отримайте достатньо потужності для розширення бізнесу'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'possible_now',
      'text' => [
        'ru' => 'Даже если это невозможно сейчас',
        'uk' => 'Навіть, якщо це неможливо зараз'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'not_pay_for_electricity',
      'text' => [
        'ru' => 'Не платите за электроэнергию, пока светит Солнце',
        'uk' => 'Не платіть за електроенергію, поки світить Сонце'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'despite_the_constant_growth',
      'text' => [
        'ru' => 'Не смотря на постоянный рост тарифов',
        'uk' => 'Не зважаючи на постійний ріст тарифів'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'energy_of_the_Sun_with_delivery',
      'text' => [
        'ru' => 'Энергия Солнца с доставкой на предприятие',
        'uk' => 'Енергія Сонця з доставкою на підприємство'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'we_provide_services',
      'text' => [
        'ru' => 'Предоставляем услуги от компании ESS',
        'uk' => 'Представляємо послуги від компанії ESS'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'services',
      'text' => [
        'ru' => 'услуги',
        'uk' => 'послуги'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'construction_solar_plants',
      'text' => [
        'ru' => 'Строительство солнечных электростанций для предприятия под собственное потребление',
        'uk' => 'Будівництво сонячних електростанцій для підприємства під власне споживання'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'network_construction',
      'text' => [
        'ru' => 'Строительство сетевых солнечных электростанций с подключением к юридическому Зеленому тарифу',
        'uk' => 'Будівництво мережевих сонячних електростанцій з підключенням до юридичного Зеленого тарифу'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'systems_guaranteed',
      'text' => [
        'ru' => 'Системы гарантированного и резервного электропитания для предприятий',
        'uk' => 'Системи гарантованого та резервного електроживлення для підприємств'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'truly_the_right_decision',
      'text' => [
        'ru' => 'По-настоящему верное решение',
        'uk' => 'Насправдi вiрне рiшення'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'own_solar_generation',
      'text' => [
        'ru' => 'Собственная солнечная генерация',
        'uk' => 'Власна сонячна генерація'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'own_solar',
      'text' => [
        'ru' => 'Собственная солнечная',
        'uk' => 'Власна сонячна'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'consume_in_light',
      'text' => [
        'ru' => 'Потребляете в светлое время дня?',
        'uk' => 'Споживаєте у світлий час доби?'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'generate_electricity',
      'text' => [
        'ru' => 'Производите электроэнергию для своего бизнеса самостоятельно!',
        'uk' => 'Виробляйте електроенергію для свого бізнесу самостійно!'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'production_cycle',
      'text' => [
        'ru' => 'Производственный цикл совпадает с солнечной активностью',
        'uk' => 'Виробничий цикл співпадає із сонячною активністю'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'consumption_peaks',
      'text' => [
        'ru' => 'Пики потребления совпадают с пиками генерации солнечной электростанции. Солнечная электроэнергия питает производственные мощности предприятия.',
        'uk' => 'Піки споживання співпадають з піками генерації сонячної електростанції. Сонячна електроенергія компенсує енергетичні потреби підприємства.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'no_intervention',
      'text' => [
        'ru' => 'Без вмешательств в электросеть предприятия',
        'uk' => 'Електромережа підприємства не змінюється'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'interference_structure',
      'text' => [
        'ru' => 'Вмешательство в существующую структуру сети минимальные. Необходимо просто подключить инвертор (2 на схеме) в существующую электросеть и установить ограничитель перетоков энергии в сеть общего потребления (smart-meter, 4 на схеме) перед электросчетчиком предприятия.',
        'uk' => 'Втручання в існуючу структуру мережі мінімальні. Необхідно просто підключити інвертор (2 на схемі) в існуючу електромережу і встановити обмежувач перетоків енергії в мережу загального користування (smart-meter, 4 на схемі) перед електролічільником підприємства.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'save_how_much',
      'text' => [
        'ru' => 'Экономьте сколько захотите, или сможете!',
        'uk' => 'Заощаджуйте скільки хочете, або можете!'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'save',
      'text' => [
        'ru' => 'Экономьте',
        'uk' => 'Заощаджуйте'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'compensated_part',
      'text' => [
        'ru' => 'Компенсируемая часть определяется мощностью станции. Чем больше фотомодулей и чем мощнее инвертор, тем больше потребление (в %) можно компенсировать в энергобалансе предприятия.',
        'uk' => 'Частка заміщення визначається потужністю станції. Чим більше фотомодулів і чим потужніший інвертор, тим більше споживання (у %) можна замістити в енергобалансі підприємства.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'minimum_power',
      'text' => [
        'ru' => 'Минимальная мощность станции – 3 кВт',
        'uk' => 'Мінімальна потужність станції – 3кВт'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'maximum',
      'text' => [
        'ru' => 'Максимальная – не ограничена! Масштабируйтесь в любой момент!',
        'uk' => 'Максимальна – необмежена! Масштабуйтесь у будь-який момент!'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'warranty',
      'text' => [
        'ru' => 'Гарантия на оборудование',
        'uk' => 'Гарантія на обладнання'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'all_equipment',
      'text' => [
        'ru' => 'Все оборудование завезено в «белую» и имеет все необходимые документы и гарантии.',
        'uk' => 'Все обладнання завезено в «білу», має всі необхідні документи та гарантії.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'scaling',
      'text' => [
        'ru' => 'Масштабирование мощности',
        'uk' => 'Масштабування потужності'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'increase_power',
      'text' => [
        'ru' => 'В любой момент можно увеличить мощность станции.',
        'uk' => 'В будь-який момент можна збільшити потужність станції.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'optimal_price',
      'text' => [
        'ru' => 'Оптимальная цена',
        'uk' => 'Оптимальна ціна'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'station_cost',
      'text' => [
        'ru' => 'Стоимость станции стартует с $580/кВт',
        'uk' => 'Вартість станції починається від $580/кВт'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'get_energy',
      'text' => [
        'ru' => 'Получите море энергии для собственного потребления',
        'uk' => 'Отримайте море енергії для власного споживання'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'energy',
      'text' => [
        'ru' => 'море энергии',
        'uk' => 'море енергії'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'video_from_objects',
      'text' => [
        'ru' => 'Видео с объектов и интервью с владельцами',
        'uk' => "Відео з об`єктів та інтерв'ю з власниками"
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'gallery_of_employees',
      'text' => [
        'ru' => 'Галерея работающих объектов:',
        'uk' => "Галерея працюючих об'єктів:"
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'gallery',
      'text' => [
        'ru' => 'Галерея',
        'uk' => 'Галерея'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'green_tariff',
      'text' => [
        'ru' => 'Зеленый тариф',
        'uk' => 'Зелений тариф'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'legal_green_tariff',
      'text' => [
        'ru' => 'Юридический «Зеленый тариф» для предприятий',
        'uk' => 'Юридичний «Зелений тариф» для підприємств'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'legal',
      'text' => [
        'ru' => 'Юридический',
        'uk' => 'Юридичний'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'ukrainian_entrepreneurs',
      'text' => [
        'ru' => 'Украинские предприниматели могут продавать солнечную электроэнергию на энергетическом рынке Украины по «Зеленому тарифу», который имеет следующие цены:',
        'uk' => 'Українські підприємці можуть продавати сонячну електроенергію на енергетичному ринку України по «Зеленому тарифу», який має наступні ціни:'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => '0.1228',
      'text' => [
        'ru' => '€0,1228/кВт.час',
        'uk' => '€0,1228/кВт⋅год'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'roof_stations',
      'text' => [
        'ru' => 'для крышных станций промышленных предприятий, офисных или административных зданий',
        'uk' => 'для дахових станцій промислових підпримств, офісних чи адміністративних будівель'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => '0.1126',
      'text' => [
        'ru' => '€0,1126/кВт.час',
        'uk' => '€0,1126/кВт⋅год'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'ground_stations',
      'text' => [
        'ru' => 'для наземных станций',
        'uk' => 'для наземних станцій'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'tariff_value',
      'text' => [
        'ru' => 'Величина тариф, по которому будет осуществляться выкуп электроэнергии гарантирован государством и зафиксирован государством в законодательстве Украины в законе',
        'uk' => 'здійснюватись викуп електроенергії гарантована державою і зафіксована державою в законодавстві Укараїни в законі'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'about_electricity',
      'text' => [
        'ru' => '«Про электроэнергетику».',
        'uk' => '«Про електроенергетику».'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'eco_friendly',
      'text' => [
        'ru' => 'Экологично-прибыльный',
        'uk' => 'Екологічно-прибутковий'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'new_business',
      'text' => [
        'ru' => 'Новый бизнес',
        'uk' => 'Новий бізнес'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'solar_power_plant_today',
      'text' => [
        'ru' => 'Сегодня солнечная электростанция на предприятии, которое подключено к «Зеленому тарифу» - это один из наиболее выгодных видов инвестиций для предприятий с достаточным количеством незадействованных площадей.',
        'uk' => 'Сьогодні сонячна електростанція на підприємстві, яка підключена до «Зеленого тарифу» є одним із найвигідніших видів інвестицій для підприємств з достатньою кількістю незадіяних площ.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'exactly_today',
      'text' => [
        'ru' => 'Именно сегодня – лучшее время, чтобы начать новый экологически-прибыльный бизнес с умножения инвестиций с компанией ESS!',
        'uk' => 'Сьогодні саме час розпочати новий екологічно-прибутковий бізнес з привабливими строками окупності і примноження інвестицій з компанією ESS!'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'net_profit',
      'text' => [
        'ru' => 'Чистая прибыль',
        'uk' => 'Чистий прибуток'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'up_to_2',
      'text' => [
        'ru' => 'до 2 млн. гривен в год',
        'uk' => 'до 2 млн. гривень в рік'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'utility_areas',
      'text' => [
        'ru' => 'с 1 гектара хозяйственных площадей (достаточно для размещения станции мощностью 0,5 мВт)',
        'uk' => 'з 1 гектару господарських площ (достатньо для розміщення станції на 0,5МВт)'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'want_to_know',
      'text' => [
        'ru' => 'Желаете узнать',
        'uk' => 'Бажаєте дізнатись'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'how_much_can_you',
      'text' => [
        'ru' => 'Сколько вы можете сэкономить или заработать?',
        'uk' => 'Скільки ви зможете заощадити або заробити?'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'save_2',
      'text' => [
        'ru' => 'сэкономить',
        'uk' => 'заощадити'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'your_name',
      'text' => [
        'ru' => 'Ваше имя',
        'uk' => 'Ваше ім’я'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'your_phone',
      'text' => [
        'ru' => 'Ваш телефон',
        'uk' => 'Ваш телефон'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'your_mail',
      'text' => [
        'ru' => 'Ваш e-mail',
        'uk' => 'Ваш e-mail'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'station_view',
      'text' => [
        'ru' => 'Выберите вид станции',
        'uk' => 'Оберіть вид станції'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'own_consumption',
      'text' => [
        'ru' => 'Собственное потребление',
        'uk' => 'Власне споживання'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'green_tariff',
      'text' => [
        'ru' => 'Зеленый тариф для предприятий',
        'uk' => 'Зелений тариф для підприємств'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'average_daily_volume',
      'text' => [
        'ru' => 'Среднедневной объем потребления бизнеса',
        'uk' => 'Середньодобова потужність навантаження бізнесу'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'consumption',
      'text' => [
        'ru' => 'Потребление за год кВт.час',
        'uk' => 'Споживання за рік кВт·год'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'current_price',
      'text' => [
        'ru' => 'Текущая цена кВт.час',
        'uk' => 'Поточна ціна кВт·год'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'available_area',
      'text' => [
        'ru' => 'Доступная площадь для установки фотомодулей',
        'uk' => 'Доступна площа для установки  фотомодулів'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'accommodation',
      'text' => [
        'ru' => 'Размещение',
        'uk' => 'Розміщення'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'roof',
      'text' => [
        'ru' => 'Крыша',
        'uk' => 'Дах'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'earth',
      'text' => [
        'ru' => 'Земля',
        'uk' => 'Земля'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'region',
      'text' => [
        'ru' => 'Регион',
        'uk' => 'Регіон'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'zp',
      'text' => [
        'ru' => 'Запорожье',
        'uk' => 'Запоріжжя'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'dn',
      'text' => [
        'ru' => 'Днепр',
        'uk' => 'Дніпро'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'get_an_offer',
      'text' => [
        'ru' => 'Получить предложение',
        'uk' => 'Отримати пропозицiю'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'whole_field',
      'text' => [
        'ru' => 'Необходимо заполнить это поле',
        'uk' => 'Необхідно заповнити це поле'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'valid_email',
      'text' => [
        'ru' => 'Необходимо ввести правильный email',
        'uk' => 'Необхідно ввести правильний email'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'business_consumes',
      'text' => [
        'ru' => 'Если вы знаете, сколько
                ваш бизнес потребляет электроэнергии в год, которое среднее
                нагрузки и сколько вы платите за киловатт-час
                нынешнем поставщику электроэнергии - заполните
                эту форму, и мы вышлем вам коммерческое предложение с
                расчетом экономии, инвестиций и их окупаемости.',
        'uk' => 'Якщо ви знаєте, скільки
                ваш бізнес споживає електроенергії за рік, яке середнє
                навантаження та скільки ви платите за кіловат-годину
                нинішньому постачальнику електроенергії — заповніть
                цю форму, і ми надішлемо вам комерційну пропозицію з
                розрахунком економії, інвестицій та їх окупністю.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'zaporiz_obl',
      'text' => [
        'ru' => 'Запорожская область',
        'uk' => 'Запорізька область'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'dnipro_obl',
      'text' => [
        'ru' => 'Днепропетровская область',
        'uk' => 'Дніпропетровська область'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'odessa_obl',
      'text' => [
        'ru' => 'Одесская область',
        'uk' => 'Одеська область'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'chernihiv_obl',
      'text' => [
        'ru' => 'Черниговская область',
        'uk' => 'Чернігівська область'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'kharkiv_obl',
      'text' => [
        'ru' => 'Харьковская область',
        'uk' => 'Харківська область'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'zhytomyr_obl',
      'text' => [
        'ru' => 'Житомирская область',
        'uk' => 'Житомирська область'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'poltava_obl',
      'text' => [
        'ru' => 'Полтавская область',
        'uk' => 'Полтавська область'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'kherson_obl',
      'text' => [
        'ru' => 'Херсонская область',
        'uk' => 'Херсонська область'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'kiev_obl',
      'text' => [
        'ru' => 'Киевская область',
        'uk' => 'Київська область'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'donetsk_obl',
      'text' => [
        'ru' => 'Донецкая область',
        'uk' => 'Донецька область'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'vinnitsa_obl',
      'text' => [
        'ru' => 'Винницкая область',
        'uk' => 'Вінницька область'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'kirovograd_obl',
      'text' => [
        'ru' => 'Кировоградская область',
        'uk' => 'Кіровоградська область'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'nikolaev_obl',
      'text' => [
        'ru' => 'Николаевская область',
        'uk' => 'Миколаївська область'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'sumy_obl',
      'text' => [
        'ru' => 'Сумская область',
        'uk' => 'Сумська область'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'lviv_obl',
      'text' => [
        'ru' => 'Львовская область',
        'uk' => 'Львівська область'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'kas_obl',
      'text' => [
        'ru' => 'Черкасская область',
        'uk' => 'Черкаська область'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'khmelnitsk_obl',
      'text' => [
        'ru' => 'Хмельницкая область',
        'uk' => 'Хмельницька область'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'volynsk_obl',
      'text' => [
        'ru' => 'Волынская область',
        'uk' => 'Волинська область'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'rivne_obl',
      'text' => [
        'ru' => 'Ровенская область',
        'uk' => 'Рівненська область'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'ivan_obl',
      'text' => [
        'ru' => 'Ивано-Франковская область',
        'uk' => 'Івано-Франківська область'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'tern_obl',
      'text' => [
        'ru' => 'Тернопольская область',
        'uk' => 'Тернопільська область'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'carpat_obl',
      'text' => [
        'ru' => 'Закарпатская область',
        'uk' => 'Закарпатська область'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'company',
      'key' => 'chernivet_obl',
      'text' => [
        'ru' => 'Черновицкая область',
        'uk' => 'Чернівецька область'
      ],
    ]);

    /** Company */

    /** Private person */

    LanguageLine::updateOrCreate([
      'group' => 'private-person',
      'key' => 'we_build',
      'text' => [
        'ru' => 'Мы строим солнечные станции',
        'uk' => 'Ми будуємо сонячні електростанції'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'private-person',
      'key' => 'network',
      'text' => [
        'ru' => 'Сетевые + «Зеленый тариф» - для заработка и экономии',
        'uk' => 'Мережеві + «Зелений тариф» - для заробітку і економії'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'private-person',
      'key' => 'hybrid',
      'text' => [
        'ru' => 'Гибридные - для автономии, экономии и заработка',
        'uk' => 'Гібридні для автономії, экономії та зарабітку'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'private-person',
      'key' => 'autonomous',
      'text' => [
        'ru' => 'Автономные - для полной автономии',
        'uk' => 'Автономні - для повної автономії'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'private-person',
      'key' => 'payment',
      'text' => [
        'ru' => 'Расчет',
        'uk' => 'Розрахунок'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'private-person',
      'key' => 'budget',
      'text' => [
        'ru' => 'Бюджет',
        'uk' => 'Бюджет'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'private-person',
      'key' => 'more',
      'text' => [
        'ru' => 'Больше',
        'uk' => 'Бiльше'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'private-person',
      'key' => 'power',
      'text' => [
        'ru' => 'Мощность',
        'uk' => 'Потужнiсть'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'private-person',
      'key' => 'installation_date',
      'text' => [
        'ru' => 'Дата монтажа',
        'uk' => 'Дата монтажу'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'private-person',
      'key' => 'accommodation',
      'text' => [
        'ru' => 'Размещение',
        'uk' => 'Розміщення'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'private-person',
      'key' => 'roof',
      'text' => [
        'ru' => 'Крыша',
        'uk' => 'Дах'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'private-person',
      'key' => 'earth',
      'text' => [
        'ru' => 'Земля',
        'uk' => 'Земля'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'private-person',
      'key' => 'roof_earth',
      'text' => [
        'ru' => 'Крыша+земля',
        'uk' => 'Дах+земля'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'private-person',
      'key' => 'order',
      'text' => [
        'ru' => 'Заказать',
        'uk' => 'Замовити'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'private-person',
      'key' => 'our_advantages',
      'text' => [
        'ru' => 'Наши преимущества:',
        'uk' => 'Нашi переваги:'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'private-person',
      'key' => 'annual_income',
      'text' => [
        'ru' => 'Годовой доход',
        'uk' => 'Річний дохід'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'private-person',
      'key' => 'warranty',
      'text' => [
        'ru' => 'Гарантия на работу',
        'uk' => 'Гарантія на роботу'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'private-person',
      'key' => 'years',
      'text' => [
        'ru' => 'лет',
        'uk' => 'рокiв'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'private-person',
      'key' => 'energy_monitoring',
      'text' => [
        'ru' => 'Энерго-мониторинг',
        'uk' => 'Енерго-монiторинг'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'private-person',
      'key' => 'questions',
      'text' => [
        'ru' => 'Есть вопросы?',
        'uk' => 'Є питання?'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'private-person',
      'key' => 'calculate',
      'text' => [
        'ru' => 'Рассчитать',
        'uk' => 'Розрахувати'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'private-person',
      'key' => 'helped_to_earn',
      'text' => [
        'ru' => 'Компания ESS уже помогла заработать с помощью «Зеленого тарифа» больше 6 000 000 млн. грн. И эта цифра растет в прогрессии с каждым месяцем работы наших станций. Нам важно строить качественные станции на качественном оборудовании с качественным монтажом. Поэтому мы всегда отвечаем за работу и даем гарантию 25 лет!',
        'uk' => 'Компанія ESS вже допомогла своїм клієнтам заробити за допомогою «Зеленого тарифу» більше 6 000 000 млн грн і ця цифра росте у прогрессії з кожним місяцем роботи наших станцій. Нам важливо будувати якісні станції на якісному обладнання з якісним монтажем. Тому ми завжди відповідаємо за свою роботу і даємо гарантію 25 років!'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'private-person',
      'key' => 'control_and_access',
      'text' => [
        'ru' => 'Контроль и доступ',
        'uk' => 'Контроль та доступ'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'private-person',
      'key' => 'monitoring',
      'text' => [
        'ru' => 'Мониторинг 24/7',
        'uk' => 'Моніторинг 24/7'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'private-person',
      'key' => 'after_launch',
      'text' => [
        'ru' => 'После запуска СЭС все показатели касательно генерации СЭС и вашей прибыли будут в вашем смартфоне и компьютере. С любой точки планеты все показатели будут перед вашими глазами, как на ладони.',
        'uk' => 'Після запуску СЕС всі показники стосовно генерації СЕС і вашого прибутку будуть у вашому смартфоні та комп’ютері. З любої точки планети всі показники будуть перед вами, як на долоні.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'private-person',
      'key' => 'want_to_know',
      'text' => [
        'ru' => 'Хотите узнать стоимость',
        'uk' => 'Бажаєте дізнатись вартість'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'private-person',
      'key' => 'your_project',
      'text' => [
        'ru' => 'вашего проекта?',
        'uk' => 'вашого проекту?'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'private-person',
      'key' => 'project_cost',
      'text' => [
        'ru' => 'Стоимость проекта',
        'uk' => 'Вартість проекту'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'private-person',
      'key' => 'leave_request',
      'text' => [
        'ru' => 'Оставьте заявку, и мы Вам перезвоним. Закажите консультацию, получите бесплатную экспертную поддержку от звонка до запуска Вашей солнечной системы!',
        'uk' => 'Залиште запит, і ми Вам передзвонимо. Замовте консультацію, отримайте безкоштовну експертну підтримку від дзвінка до запуску Вашої сонячної системи!'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'private-person',
      'key' => 'your_name',
      'text' => [
        'ru' => 'Ваше имя',
        'uk' => "Ваше ім'я"
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'private-person',
      'key' => 'phone',
      'text' => [
        'ru' => 'Телефон',
        'uk' => 'Телефон'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'private-person',
      'key' => 'email',
      'text' => [
        'ru' => 'Электронная почта',
        'uk' => 'Електронна пошта'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'private-person',
      'key' => 'field_required',
      'text' => [
        'ru' => 'Необходимо заполнить это поле',
        'uk' => 'Необхідно заповнити це поле'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'private-person',
      'key' => 'correct_email',
      'text' => [
        'ru' => 'Необходимо ввести правильный email',
        'uk' => 'Необхідно ввести правильний email'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'private-person',
      'key' => 'next',
      'text' => [
        'ru' => 'Ближайший',
        'uk' => 'Найближчий'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'private-person',
      'key' => 'month',
      'text' => [
        'ru' => 'месяц',
        'uk' => 'місяць'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'private-person',
      'key' => 'type',
      'text' => [
        'ru' => 'Тип станции',
        'uk' => 'Тип станції'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'private-person',
      'key' => 'network_2',
      'text' => [
        'ru' => 'Сетевая',
        'uk' => 'Мережева'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'private-person',
      'key' => 'hybrid_2',
      'text' => [
        'ru' => 'Гибридная',
        'uk' => 'Гібридна'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'private-person',
      'key' => 'autonomous_2',
      'text' => [
        'ru' => 'Автономная',
        'uk' => 'Автономна'
      ],
    ]);

    /** Private person */

    /** Kness */

    LanguageLine::updateOrCreate([
      'group' => 'kness',
      'key' => 'solar_technology',
      'text' => [
        'ru' => 'Солнечные технологии строят безоблачное будущее - для этого мы строим солнечные электростанции для Украины совместно с компанией KNESS.',
        'uk' => 'Сонячні технології будують сонячне майбутнє — для цього ми будуємо сонячні електростанції для України спільно з компанією KNESS.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'kness',
      'key' => 'for_your_clients',
      'text' => [
        'ru' => 'Для своих клиентов мы открываем доступ к чистой энергии украинского производства - солнечных панелей KNESS.',
        'uk' => 'Для своіх клієнтів ми відкриваємо доступ до чистої енергії українського виробництва — сонячних панелей KNESS.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'kness',
      'key' => 'reduce_impact',
      'text' => [
        'ru' => 'Уменьшить влияние энергетики на глобальные экологические изменения путем ее декарбонизации.',
        'uk' => 'Зменшити вплив енергетики на глобальні екологічні зміни шляхом її декарбонізації.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'kness',
      'key' => 'their_work',
      'text' => [
        'ru' => 'В своей работе мы руководствуемся европейскими принципами ведения бизнеса.',
        'uk' => 'В своїй роботі ми керуємося європейськими принципами ведення бізнесу.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'kness',
      'key' => 'high_standards',
      'text' => [
        'ru' => 'Высокие стандарты воплощения ваших амбициозных целей, позволят вам почувствовать результат максимально быстро.',
        'uk' => 'Найвищі стандарти втілення ваших амбітних цілей, дають змогу вам відчути результат  максимально швидко.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'kness',
      'key' => 'reflect_positively',
      'text' => [
        'ru' => 'Все, что мы делаем с компанией KNESS, должно положительно отражаться на качестве жизни поколений, которые придут.',
        'uk' => 'Все, що ми робимо з компанією KNESS, має позитивно відображатися на якості життя поколінь, які прийдуть.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'kness',
      'key' => 'calculate',
      'text' => [
        'ru' => 'Рассчитать',
        'uk' => 'Розрахувати'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'kness',
      'key' => 'values',
      'text' => [
        'ru' => 'Ценности KNESS:',
        'uk' => 'Цінності KNESS:'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'kness',
      'key' => 'innovativeness',
      'text' => [
        'ru' => 'Инновационность',
        'uk' => 'Інноваційність'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'kness',
      'key' => 'our_success',
      'text' => [
        'ru' => 'Инновации - залог нашего успеха Приоритетом для KNESS является внедрение и создание новейших технологий, использование самых современных разработок.',
        'uk' => 'Інновації – запорука нашого успіху. Пріоритетом для KNESS є впровадження та створення новітніх технологій, використання найдосконаліших сучасних розробок.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'kness',
      'key' => 'reputation',
      'text' => [
        'ru' => 'Репутация',
        'uk' => 'Репутація'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'kness',
      'key' => 'honesty',
      'text' => [
        'ru' => 'Честность, надежность и неизменно высокая гарантия качества.',
        'uk' => 'Чесність, надійність та незмінна гарантія якості.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'kness',
      'key' => 'awareness',
      'text' => [
        'ru' => 'Честность, надежность и неизменно высокая гарантия качества. Обознанность других о наших поступках, целях и ценностях, об ответственности за каждое наше слово и действие формирует нашу репутацию.',
        'uk' => 'Чесність, надійність та незмінна гарантія якості. Знання інших про наші вчинки, цілі та цінності, про відповідальність за кожне наше слово та дію формують нашу репутацію.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'kness',
      'key' => 'socially',
      'text' => [
        'ru' => 'Социально',
        'uk' => 'Соціально'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'kness',
      'key' => 'socially_responsible',
      'text' => [
        'ru' => 'Социально ответственная компания',
        'uk' => 'Соціально відповідальна компанія'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'kness',
      'key' => 'company',
      'text' => [
        'ru' => 'Компания KNESS фокусирует свои силы, знания и ресурсы на развитии "чистой энергии" в широком смысле этих слов. Мы поддерживаем эту инициативу и убеждены, что результат команды всегда больше, чем сумма результатов каждого участника.',
        'uk' => 'Компанія KNESS фокусує свої сили, знання та ресурси на розвитку "чистої енергії" у найширшому розумінні, інвестуючи у чисту енергію людей та природи. Ми підтримуємо цю ініціативу і переконані, що результат команди завжди більший ніж сума результатів кожного учасника.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'kness',
      'key' => 'order',
      'text' => [
        'ru' => 'Заказать',
        'uk' => 'Замовити'
      ],
    ]);

    /** Kness */

    /** Main footer */

    LanguageLine::updateOrCreate([
      'group' => 'main-footer',
      'key' => 'want_to_discuss',
      'text' => [
        'ru' => 'Хотите обсудить ваш будущий проект?',
        'uk' => 'Бажаєте обговорити ваш майбутній проект?'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-footer',
      'key' => 'discuss',
      'text' => [
        'ru' => 'обсудим проект',
        'uk' => 'обговоримо проект'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-footer',
      'key' => 'your_name',
      'text' => [
        'ru' => 'Ваше имя',
        'uk' => 'Ваше ім’я'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-footer',
      'key' => 'phone',
      'text' => [
        'ru' => 'Телефон',
        'uk' => 'Телефон'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-footer',
      'key' => 'email',
      'text' => [
        'ru' => 'Электронная почта',
        'uk' => 'Електронна пошта'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-footer',
      'key' => 'find_cost',
      'text' => [
        'ru' => 'Узнать стоимость',
        'uk' => 'Дізнатись вартість'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-footer',
      'key' => 'rights_reserved',
      'text' => [
        'ru' => '@ 2020 Все права защищены.',
        'uk' => '@ 2020 Всі права захищені'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-footer',
      'key' => 'designed',
      'text' => [
        'ru' => 'Разработано в',
        'uk' => 'Розроблено в'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-footer',
      'key' => 'calculate_yourself',
      'text' => [
        'ru' => 'Или расчитать стоимость самостоятельно',
        'uk' => 'Або розрахувати вартість самостійно'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-footer',
      'key' => 'calculate',
      'text' => [
        'ru' => 'Калькулятор СЭС',
        'uk' => 'Калькулятор СЕС'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-footer',
      'key' => 'whole_field',
      'text' => [
        'ru' => 'Необходимо заполнить это поле',
        'uk' => 'Необхідно заповнити це поле'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'main-footer',
      'key' => 'valid_email',
      'text' => [
        'ru' => 'Необходимо ввести правильный email',
        'uk' => 'Необхідно ввести правильний email'
      ],
    ]);

    /** Main footer */

    /** Footer */

    LanguageLine::updateOrCreate([
      'group' => 'footer',
      'key' => 'rights_reserved',
      'text' => [
        'ru' => '@ 2020 Все права защищены.',
        'uk' => '@ 2020 Всі права захищені.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'footer',
      'key' => 'designed',
      'text' => [
        'ru' => 'Разработано в',
        'uk' => 'Розроблено в'
      ],
    ]);

    /** Footer */

    /** Project */

    LanguageLine::updateOrCreate([
      'group' => 'project',
      'key' => 'address',
      'text' => [
        'ru' => 'Адрес',
        'uk' => 'Адреса'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'project',
      'key' => 'specifications',
      'text' => [
        'ru' => 'Характеристики СЭС',
        'uk' => 'Характеристики СЕС'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'project',
      'key' => 'commissioning',
      'text' => [
        'ru' => 'Ввод в эксплуатацию',
        'uk' => 'Введення в експлуатацію'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'project',
      'key' => 'other_jobs',
      'text' => [
        'ru' => 'Другие работы',
        'uk' => 'інші роботи'
      ],
    ]);

    /** Project */

    /** About */

    LanguageLine::updateOrCreate([
      'group' => 'about',
      'key' => 'about',
      'text' => [
        'ru' => 'О нас',
        'uk' => 'Про нас'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'about',
      'key' => 'energy2',
      'text' => [
        'ru' => 'Энергия не возникает',
        'uk' => 'Енергiя не виникає'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'about',
      'key' => 'does_disappear',
      'text' => [
        'ru' => 'из неоткуда и не исчезает в никуда',
        'uk' => 'з нiчого i не зникає нiкуди'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'about',
      'key' => 'goes_over',
      'text' => [
        'ru' => 'Она всего лишь переходити з одной формы в другую',
        'uk' => 'Вона лиш переходить з однiєї  форми в iншу'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'about',
      'key' => 'energosave_company',
      'text' => [
        'ru' => 'Компания ENERGOSAVE SYSTEMS - это исключительно иновационные методы производства и сохранения энергии. Мы являемся оициальным диллером компании №1 в мире на рынке солнечных панелей.',
        'uk' => 'Компанія ENERGOSAVE SYSTEMS – це виключно інноваційні методи виробництва та збереження енергії. Ми є офіційним дилером компанії №1 у світі у галузі сонячних технологій.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'about',
      'key' => 'our_team',
      'text' => [
        'ru' => 'Наша команда - это высококвалифицированные специалисты. Доказательством нашего опыта могут быть только наши результаты. Мы пропагандируем честные и прозрачные цены, которые не будут меняться в период от телефонного разговора до встречи с нами.',
        'uk' => 'Наша команда – це кваліфіковані спеціалісти. Доказами нашого досвіду можуть бути тільки наші результати. Ми пропагуємо достовірні і прозорі ціни, котрі не будуть змінюватися в період від телефонної розмови до зустрічі з нами.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'about',
      'key' => 'details',
      'text' => [
        'ru' => 'подробнее',
        'uk' => 'детальніше'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'about',
      'key' => 'form_creation',
      'text' => [
        'ru' => 'Создание формы',
        'uk' => 'Стоврення форми'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'about',
      'key' => 'energy_state',
      'text' => [
        'ru' => 'Энергия государства',
        'uk' => 'Енергiя держави'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'about',
      'key' => 'energy_problems',
      'text' => [
        'ru' => 'Мы решаем энергетические проблемы украинцев сегодня, чтобы построить энергетически независимое государство завтра!',
        'uk' => 'Ми вирiшуємо енергетичнi проблеми українцiв сьогоднi, щоб збудувати енергетично незалежну державу завтра!'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'about',
      'key' => 'create_form',
      'text' => [
        'ru' => 'Главное – создать форму, которая максимально долго будет конвертировать энергию ваших ожиданий в энергию вашего удовлетворения результатом.',
        'uk' => 'Головне – стоврення форми, яка максимально тривало буде конвертувати енергiю очiкувань в енергiю задоволення результатом.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'about',
      'key' => 'form',
      'text' => [
        'ru' => 'И мы создали эту форму.',
        'uk' => 'І ми створили цю форму.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'about',
      'key' => 'energy_innovation',
      'text' => [
        'ru' => 'Энергия инноваций',
        'uk' => 'Енергiя iновацiй'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'about',
      'key' => 'official_dealer',
      'text' => [
        'ru' => 'ESS – официальный дилер в Украине самого современного производителя солнечных панелей в мире.',
        'uk' => 'ESS – офіційний дилер в Україні найсучаснішого виробника панелей у світі.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'about',
      'key' => 'american_energy_company',
      'text' => [
        'ru' => 'SUNPOWER – американская энергетическая компания, которая разрабатывает и производит кристаллические кремниевые фотоэлектрические элементы и солнечные панели на основе полностью контактного солнечного элемента, изобретенного в Стэнфордском университете.',
        'uk' => 'SUNPOWER – американська енергетична компанія, котра розробляє та виробляє кристалічні кремнієві фотоелектричні елементи та сонячні панелі на основі повністю контактного сонячного елементу, винайденого у Стенфордському університеті.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'about',
      'key' => 'high_tech',
      'text' => [
        'ru' => 'SUNPOWER – выбор высокотехнологичных компаний',
        'uk' => 'SUNPOWER – вибір високотехнологічних компаній'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'about',
      'key' => 'ukrainian_energy',
      'text' => [
        'ru' => 'Украинская энергия',
        'uk' => 'Українська енергiя'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'about',
      'key' => 'ukrainian_manufacturer',
      'text' => [
        'ru' => 'KNESS – те, кому доверяет первый украинский производитель солнечных панелей. Мы – официальный дистрибьютор компании «KNESS».',
        'uk' => 'KNESS – тi, кому довiряє перший український виробник сонячних панелей. Ми офiцiйнi дистриб’ютори компанiї «KNESS».'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'about',
      'key' => 'we_ready',
      'text' => [
        'ru' => 'Мы готовы Вам предложить',
        'uk' => 'Ми готовi Вам запропонувати'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'about',
      'key' => 'ready',
      'text' => [
        'ru' => 'готовы предложить',
        'uk' => 'готовi запропонувати'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'about',
      'key' => 'record',
      'text' => [
        'ru' => 'Рекордные',
        'uk' => 'Рекордні'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'about',
      'key' => 'solar_panels',
      'text' => [
        'ru' => 'солнечные панели SUNPOWER',
        'uk' => 'сонячні панелі SUNPOWER'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'about',
      'key' => 'building',
      'text' => [
        'ru' => 'Строительство',
        'uk' => 'Будівництво'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'about',
      'key' => 'sun',
      'text' => [
        'ru' => 'солнечных',
        'uk' => 'сонячних'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'about',
      'key' => 'station',
      'text' => [
        'ru' => 'станций',
        'uk' => 'станцій'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'about',
      'key' => 'charging_stations',
      'text' => [
        'ru' => 'Зарядные станции',
        'uk' => 'Зарядні станції'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'about',
      'key' => 'electric_cars',
      'text' => [
        'ru' => 'электрокаров',
        'uk' => 'ектрокарів'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'about',
      'key' => 'sources',
      'text' => [
        'ru' => 'Источники',
        'uk' => 'Джерела'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'about',
      'key' => 'uninterrupted',
      'text' => [
        'ru' => 'бесперебойного',
        'uk' => 'безперебійного'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'about',
      'key' => 'power',
      'text' => [
        'ru' => 'питания',
        'uk' => 'живлення'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'about',
      'key' => 'systems',
      'text' => [
        'ru' => 'Системы',
        'uk' => 'Системи'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'about',
      'key' => 'accumulation',
      'text' => [
        'ru' => 'накопления',
        'uk' => 'накопичення'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'about',
      'key' => 'energy',
      'text' => [
        'ru' => 'энергии',
        'uk' => 'енергії'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'about',
      'key' => 'solar_systems',
      'text' => [
        'ru' => 'Гелиосистемы',
        'uk' => 'Геліосистеми'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'about',
      'key' => 'heating',
      'text' => [
        'ru' => 'для подогрева',
        'uk' => 'для підігріву'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'about',
      'key' => 'water',
      'text' => [
        'ru' => 'воды',
        'uk' => 'води'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'about',
      'key' => 'thermal',
      'text' => [
        'ru' => 'Тепловые',
        'uk' => 'Теплові'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'about',
      'key' => 'pumps',
      'text' => [
        'ru' => 'насосы',
        'uk' => 'насоси'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'about',
      'key' => 'electric_boilers',
      'text' => [
        'ru' => 'Электрокотлы',
        'uk' => 'Електрокотли'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'about',
      'key' => 'order_guarantees',
      'text' => [
        'ru' => 'Гарантии заказа солнечных систем у нас',
        'uk' => 'Гарантії замовлення сонячних систем у нас'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'about',
      'key' => 'quality',
      'text' => [
        'ru' => 'Качество',
        'uk' => 'Якість'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'about',
      'key' => 'warranty',
      'text' => [
        'ru' => 'Гарантия на панели и инвертор - 5-25 лет. На протяжении всего гарантийного срока мы оперативно поможем решить любые вопросы.',
        'uk' => 'Гарантія на панелі та інвертор – 5-25 років. На протязі всього гарантійного терміну ми оперативно допоможемо вирішити будь-які питання.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'about',
      'key' => 'deadlines',
      'text' => [
        'ru' => 'Соблюдение сроков',
        'uk' => 'Дотримання термінів'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'about',
      'key' => 'responsibly',
      'text' => [
        'ru' => 'Мы ответственно относимся к своей работе и сразу после Вашего звонка начинаем делать совместные с вами шаги к реализации проекта.',
        'uk' => 'Ми відповідально ставимося до своєї роботи і відразу після Вашого дзвінка починаємо робити спільні з вами кроки до реалізації проекту.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'about',
      'key' => 'saving',
      'text' => [
        'ru' => 'Экономия',
        'uk' => 'Економія'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'about',
      'key' => 'prices',
      'text' => [
        'ru' => 'Наши цены традиционно «ложатся» в кошелек большинства наших клиентов. Наша ценовая политика отличается прозрачностью и лояльностью к клиентам с серьезными намерениями.',
        'uk' => 'Наші ціни традиційно «лягають» в гаманець більшості наших клієнтів. Наша цінова політика відрізняється прозорістю та лояльністю до клієнтів з серйозними намірами.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'about',
      'key' => 'official_dealer',
      'text' => [
        'ru' => 'ESS - официальный дилер в Украине самых современных солнечных панелей в мире.',
        'uk' => 'ESS – офiцiйний дилер в Українi найсучаснiших сонячних панелей у свiтi.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'about',
      'key' => 'produces_crystal',
      'text' => [
        'ru' => 'Американская энергетическая компания, которая разрабатывает и производит кристаллические кремниевые фотоэлектрические элементы и солнечные панели на основе полностью контактного солнечного элемента, изобретенного в Стэнфордском университете.',
        'uk' => 'Американська енергетична компанія, яка розробляє і виробляє кристалічні кремнієві фотоелектричні елементи і сонячні панелі на основі повністю контактного сонячного елемента, винайденого в Стенфордському університеті.'
      ],
    ]);

    /** About */

    /** Project form */

    LanguageLine::updateOrCreate([
      'group' => 'project-form',
      'key' => 'know',
      'text' => [
        'ru' => 'Хотите узнать стоимость',
        'uk' => 'Хочете дізнатися вартість'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'project-form',
      'key' => 'project',
      'text' => [
        'ru' => 'вашего проекта?',
        'uk' => 'вашого проекту?'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'project-form',
      'key' => 'cost',
      'text' => [
        'ru' => 'Стоимость проекта',
        'uk' => 'Вартість проекту'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'project-form',
      'key' => 'request',
      'text' => [
        'ru' => 'Оставьте заявку, и мы Вам перезвоним. Закажите консультацию, получите бесплатную экспертную поддержку от звонка до запуска Вашей солнечной системы!',
        'uk' => 'Залиште заявку, і ми Вам зателефонуємо. Замовте консультацію, отримаєте безкоштовну експертну підтримку від дзвінка до запуску Вашої сонячної системи!'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'project-form',
      'key' => 'name',
      'text' => [
        'ru' => 'Ваше имя',
        'uk' => "Ваше ім'я"
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'project-form',
      'key' => 'phone',
      'text' => [
        'ru' => 'Телефон',
        'uk' => 'Телефон'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'project-form',
      'key' => 'email',
      'text' => [
        'ru' => 'Электронная почта',
        'uk' => 'Електронна пошта'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'project-form',
      'key' => 'budget',
      'text' => [
        'ru' => 'Бюджет',
        'uk' => 'Бюджет'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'project-form',
      'key' => 'more',
      'text' => [
        'ru' => 'Больше',
        'uk' => 'Бiльше'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'project-form',
      'key' => 'power_2',
      'text' => [
        'ru' => 'Мощность',
        'uk' => 'Потужнiсть'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'project-form',
      'key' => 'installation_date',
      'text' => [
        'ru' => 'Дата монтажа',
        'uk' => 'Дата монтажу'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'project-form',
      'key' => 'accommodation',
      'text' => [
        'ru' => 'Размещение',
        'uk' => 'Розміщення'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'project-form',
      'key' => 'roof',
      'text' => [
        'ru' => 'Крыша',
        'uk' => 'Дах'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'project-form',
      'key' => 'earth',
      'text' => [
        'ru' => 'Земля',
        'uk' => 'Земля'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'project-form',
      'key' => 'roof_earth',
      'text' => [
        'ru' => 'Крыша+земля',
        'uk' => 'Дах+земля'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'project-form',
      'key' => 'order',
      'text' => [
        'ru' => 'Заказать',
        'uk' => 'Замовити'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'project-form',
      'key' => 'whole_field',
      'text' => [
        'ru' => 'Необходимо заполнить это поле',
        'uk' => 'Необхідно заповнити це поле'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'project-form',
      'key' => 'correct_email',
      'text' => [
        'ru' => 'Необходимо ввести правильный email',
        'uk' => 'Необхідно ввести правильний email'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'project-form',
      'key' => 'nearest',
      'text' => [
        'ru' => 'Ближайший',
        'uk' => 'Найближчий'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'project-form',
      'key' => 'month',
      'text' => [
        'ru' => 'месяц',
        'uk' => 'місяць'
      ],
    ]);

    /** Project form */

    /** Sunpower */

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'only_strength',
      'text' => [
        'ru' => 'Единственная сила, которая способна изменить мир - сила Солнца',
        'uk' => 'Єдина сила, яка здатна змінити світ — сила Сонця'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'world_leader',
      'text' => [
        'ru' => 'Компания ESS представляет Украине мирового лидера в области солнечной энергетики - американского производителя солнечных панелей SUNPOWER.',
        'uk' => 'Компанія ESS представляє Україні світового лідера у галузі сонячної енергетики — американського виробника сонячних панелей SUNPOWER.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'chosen',
      'text' => [
        'ru' => 'Почему мы выбрали SUNPOWER?',
        'uk' => 'Чому ми обрали SUNPOWER?'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'using_conventional',
      'text' => [
        'ru' => 'Используя обычные солнечные панели, мы способны удовлетворить желания домовладельцев и предпринимателей – достичь энергетической независимости.',
        'uk' => 'Використовуючи звичайні сонячні панелі, ми здатні задовільнити бажання домовласників та підприємців досягти енергетичної незалежності.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'do_it',
      'text' => [
        'ru' => 'Как это делают практически все магазины, которые соревнуются друг с другом за клиента, снижая цены. Но ...',
        'uk' => 'Як це роблять практично всі магазини, які змагаються один з одним за клієнта знижуючи ціни. Але...'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'help_customer',
      'text' => [
        'ru' => 'Помочь заказчику не только достичь энергетической независимости, но и не потерять ее. И среди многих производителей SUNPOWER при производстве панелей делает акцент именно на долговечности своих модулей.',
        'uk' => 'Допомогти замовнику не тільки досягти енергетичної незалежності, але й не втратити ії.  І серед багатьох виробників SUNPOWER при виробницстві панелей робить акцент саме на довговічності свої панелей.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'most_powerful',
      'text' => [
        'ru' => 'Именно поэтому самые мощные в мире корпорации выбирают SUNPOWER чаще других производителей в мире.',
        'uk' => 'Саме тому наймогутніші у світі корпорації обирають SUNPOWER частіше за інших виробників у світі.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'first',
      'text' => [
        'ru' => 'Первые на «третьей» от Солнца',
        'uk' => 'Перші на «третій» від Сонця'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'clients',
      'text' => [
        'ru' => 'Клиенты SUNPOWER',
        'uk' => 'Клієнти SUNPOWER'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'have_chosen',
      'text' => [
        'ru' => 'выбрали SUNPOWER',
        'uk' => 'обрали SUNPOWER'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'calculation',
      'text' => [
        'ru' => 'Заказать расчет',
        'uk' => 'Замовити розрахунок'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'our_advantages',
      'text' => [
        'ru' => 'Наши преимущества',
        'uk' => 'Нашi переваги'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'advantages_2',
      'text' => [
        'ru' => 'преимущества',
        'uk' => 'переваги'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'suggestions',
      'text' => [
        'ru' => 'От предложений до монтажа, от технического обслуживания до учета, мы обязуемся обеспечить высокое качество обслуживания клиентов и строгое соблюдение этических деловых норм и стандартов.',
        'uk' => 'Від пропозицій до встановлення, технічного обслуговування до обліку, ми зобов’язуємось забезпечити найвищу якість обслуговування клієнтів та суворе дотримання етичних ділових норм і стандартів.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'seriously',
      'text' => [
        'ru' => 'Мы очень серьезно относимся к вашему бизнесу и верим в создание долгосрочных отношений именно с Вами.',
        'uk' => 'Ми дуже серйозно ставимось до вашого бізнесу і віримо у створення довготривалих відносин із клієнтами.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'count',
      'text' => [
        'ru' => 'Так же, как и на Солнце, вы можете рассчитывать на команду ESS, которая поможет вам достичь своих устойчивых и финансовых целей, перейдя на солнечную энергию от SUNPOWER.',
        'uk' => 'Так само як на Сонце, ви можете розраховувати на команду ESS, яка допоможе вам досягти своїх стійких та фінансових цілей, перейшовши на сонячну енергію від SUNPOWER.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'questions',
      'text' => [
        'ru' => 'Есть вопросы?',
        'uk' => 'Є питанная?'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'exists',
      'text' => [
        'ru' => 'Преимущества SUNPOWER Performance',
        'uk' => 'Переваги SUNPOWER Performance'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'two_rulers',
      'text' => [
        'ru' => 'две линейки модулей SUNPOWER',
        'uk' => 'дві лінійки модулів SUNPOWER'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'start',
      'text' => [
        'ru' => 'Начнем с Performance и его структуры:',
        'uk' => 'Почнемо з Performance і його структури:'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'hypercoles',
      'text' => [
        'ru' => 'Гиперцелы - кристаллы с уникальной основой. Эффективность (КПД) 20.1%',
        'uk' => 'Гіперцели — кристали з унікальною основою. Ефективність (ККД) 20.1%'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'lack',
      'text' => [
        'ru' => 'Отсутствие BUSS-баров освобождает дополнительное место для солнечных элементов и большей генерации. Допустимые отклонения мощности  +10/ -0%',
        'uk' => 'Відсутність BUSS-барів звільнила додаткове місце для сонячних елементів і більшої генерації. Допустимі відхилення потужності  +10/ −0%'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'extra_space',
      'text' => [
        'ru' => 'Инновационная черепичная конструкция обеспечивает гибкость в стрессовых условиях. Ударопрочность: град диаметром 25 mm на скорости 23 m/s',
        'uk' => 'Провідна черепична конструкція забезпечує гнучкість у стресових умовах. Ударостійкість: град діаметром 25 mm на швидкості 23 m/s'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'monocrystal',
      'text' => [
        'ru' => 'Они сгибаются в то время, когда обычный моно- кристалл - ломается. Макс. Нагрузка: Ветер 2400 Pa, 245 kg / m² front & back. Снег 5400 Pa, 550 kg / m² front',
        'uk' => 'Вони згинаються в той час, коли звичайний моно-кристал — ламається. Макс. Навантаж: Вітер: 2400 Pa, 245 kg/m² front & back. Сніг: 5400 Pa, 550 kg/m² front'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'durability',
      'text' => [
        'ru' => 'Долговечность, которой можно доверять',
        'uk' => 'Довговічність, якій можна довіряти'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'designed',
      'text' => [
        'ru' => 'Панели SUNPOWER Performance спроектированы таким образом, чтобы энергия поступала меньшими ячейками, расположенными',
        'uk' => 'Панелі SUNPOWER Performance спроектовані таким чином, щоб енергія надходила меншими осередками, розташованими'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'independent',
      'text' => [
        'ru' => 'в независимых рядах, соединенных между собой с помощью плотных электрических соединений, что значительно уменьшает влияние затенения на работу панели.',
        'uk' => "в незалежних рядах, з'єднаних між собою за допомогою щільних електричних з'єднань, що значно зменшує вплив затінення на роботу панелі."
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'uncompromising',
      'text' => [
        'ru' => 'SUNPOWER Performance - бескомпромиссная производительность, исключительный результат.',
        'uk' => 'SUNPOWER Performance — безкомпромісна продуктивність, вийнятковий результат.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'construction',
      'text' => [
        'ru' => 'Лидеры по строительству солнечных станций SUNPOWER в Украине',
        'uk' => 'Лідери з будівництва сонячних станцій SUNPOWER в Україні'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'leader',
      'text' => [
        'ru' => 'Компания ESS является лидером по строительству солнечных станций SUNPOWER в Украине. Построенные нами станции сконцентрированы в Кривом Роге и Днепропетровской области. Но мы работаем по всей Украине.',
        'uk' => 'Компанія ESS є лідером з будівництва сонячних станцій SUNPOWER в Україні. Побудовані нами станції сконцентровані в Кривому Розі та Дніпропетровській області. Але ми працюємо по всій України.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'order',
      'text' => [
        'ru' => 'Заказать проект',
        'uk' => 'Замовити проект'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'reinforced_connections',
      'text' => [
        'ru' => 'Усиленные соединения обеспечивают стабильную работу панелей в условиях ежедневных перепадов температуры и в то же время они образуют сеть гибких дорожек, по которым течет электроэнергия.',
        'uk' => "Посилені з'єднання забезпечують стабільну роботу панелей в умовах щоденних перепадів температури і в той же час вони утворюють мережу гнучких доріжок, по яким тече електроенергія."
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'level',
      'text' => [
        'ru' => 'Этот уровень качества и полноценная гарантия позволяют планировать инвестиционные проекты с горизонтом в 25 - 40 лет.',
        'uk' => 'Цей рівень якості та повноцінна гарантія дозволяють планувати інвестиційні проекти з горизонтом у 25 - 40 років.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'uncompromising_performance',
      'text' => [
        'ru' => 'Бескомпромиссная производительность, исключительный результат.',
        'uk' => 'Безкомпромісна продуктивність, вийнятковий результат.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'legal_garniah',
      'text' => [
        'ru' => 'Юридическая гарнатия от производителя на панели составляет 25 лет, что является самой большой гарантией в области солнечной энергетики в мире!',
        'uk' => 'Юридична гарнатія від виробника  на панелі становить 25 років, що є найбільшою гарантією у галузі сонячної енергетики у світі!'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'second_line',
      'text' => [
        'ru' => 'Вторая линейка SUNPOWER - солнечные панели SUNPOWER Maxeon.',
        'uk' => 'Друга лінійка продукції SUNPOWER — сонячні панелі SUNPOWER Maxeon.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'solar_modules',
      'text' => [
        'ru' => 'Maxeon - это солнечные модули №1 в мире. Панели, которые повторно выбирают 7/10 топовых мировых корпораций от Apple до Toyota, и это не странно, ведь в в Maxeon просчитано все - до йоты:',
        'uk' => 'Maxeon — це сонячні модулі №1 у світі. Панелі, які повторно обирають 7/10 топових світових корпорацій: від Apple до Toyota, бо в Maxeon прораховано все до йоти:'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'sealant',
      'text' => [
        'ru' => 'ЗАПАТЕНТОВАННЫЙ ГЕРМЕТИК',
        'uk' => 'ЗАПАТЕНТОВАНИЙ ГЕРМЕТИК'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'exceptional_resilience',
      'text' => [
        'ru' => 'Исключительная устойчивость к влаге и электрических напряжений обеспечивает высочайшую надежность в условиях дождя, штормового ветра, града и других экстремальных погодных условий в которых часто работают украинские солнечные электростанции',
        'uk' => 'Виняткова стійкість до вологи та електричних напруг забезпечує найвищу надійність в умовах дощу, штормового вітру, граду та інших екстремальних погодних умов у яких часто працюють українські сонячні електростанції'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'frame',
      'text' => [
        'ru' => 'ОБРАМЛЕНИЕ',
        'uk' => 'ОБРАМЛЕННЯ'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'connect',
      'text' => [
        'ru' => 'Для соединения усовершенствованной алюминиевой конструкции с солнечным ламинатом используется клей с аэрокосмической промышленности, обеспечивает беспрепятственную работу даже при циклических ветровых нагрузках',
        'uk' => "Для з'єднання удосконаленої алюмінієвої конструкції з сонячним ламінатом використовується клей з аерокосмічної промисловості, що забезпечує безперешкодну роботу навіть при циклічних вітрових навантаженнях"
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'glass',
      'text' => [
        'ru' => 'АНТИБЛИКОВОЕ СТЕКЛО',
        'uk' => 'АНТИБЛІКОВЕ СКЛО'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'qualification',
      'text' => [
        'ru' => 'Большая квалификация поставщиков стекла обеспечиваю надежный слой с равномерным внешним видом, максимально увеличивая производительность в облачные дни',
        'uk' => 'Велика кваліфікація постачальників скла забезпечую надійний шар з рівномірним зовнішнім виглядом, максимально збільшуючи продуктивність у хмарні дні'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'silicon',
      'text' => [
        'ru' => 'ОЧИЩЕННЫЙ КРЕМНИЙ',
        'uk' => 'ОЧИШЕНИЙ КРЕМНIЙ'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'high_quality',
      'text' => [
        'ru' => 'Высококачественный монокристаллический кремний, который имеет минимальное количество примесей и улучшенные показатели по преобразованию энергии',
        'uk' => 'Високоякісний монокристалічний кремній, який має мінімальну кількість домішок і покращені показники  з перетворення енергії'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'barrier',
      'text' => [
        'ru' => 'ОЛОВЯННЫЙ КОРРОЗИОННЫЙ БАРЬЕР',
        'uk' => "ОЛОВ'ЯНИЙ КОРОЗІЙНИЙ БАР'ЄР"
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'tin',
      'text' => [
        'ru' => 'Покрытая оловом медь, является проверенным десятилетиями методом, который почти не поддается коррозии',
        'uk' => 'Вкрита оловом мідь, є перевіреним дисятиліттями методом, який майже на піддається корозії'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'copper',
      'text' => [
        'ru' => 'МЕДНОЕ ОСНОВАНИЕ',
        'uk' => 'ВМІДНА ОСНОВА'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'plain_copper',
      'text' => [
        'ru' => 'Обычная медь имеет высокую проводимость и является пластичной, сохраняя солнечные элементы электрически неповрежденными даже если они треснувшие',
        'uk' => 'Звичайна мідь має високу провідність та є пластичною, зберігаючи сонячні елементи електрично непошкодженими навіть якщо вони тріснуті'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'efficiency',
      'text' => [
        'ru' => 'Максимум эффективности',
        'uk' => 'Максимум ефективностi'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'max',
      'text' => [
        'ru' => 'Максимум',
        'uk' => 'Максимум'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'generation',
      'text' => [
        'ru' => 'Увеличена генерация',
        'uk' => 'Збiльшена генерацiя'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'average',
      'text' => [
        'ru' => 'В среднем на 7-10% больше с каждого вата в обычных модулях, а также вранциб вечером, в жару, в облачную погоду, зимой и где угодно и в любое время (кроме ночи).',
        'uk' => 'У середньому на 7-10% більше з кожного вата в звичайних модулях, а також вранціб ввечері, в спеку, у хмарну погоду, взимку та будь де і будь коли (окрім ночі).'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'advantages',
      'text' => [
        'ru' => 'Преимущества при затенение и загрязнения',
        'uk' => 'Переваги при затiненнi та забрудненнi'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'generating_more',
      'text' => [
        'ru' => 'Генерация больше на 20-40%, чем в обычных панелей. Каждый элемент имеет диодный защиту.',
        'uk' => 'Генерація більше на 20-40%, ніж у звичайних панелей. Кожен елемент має діодний захист.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'environmental',
      'text' => [
        'ru' => 'Самые экологичные в мире',
        'uk' => 'Найекологiчнiшi у свiтi'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'ranking_social',
      'text' => [
        'ru' => '1 место в рейтинге социальной и экологической ответственности Кремниевой долины; единственная в мире солнечная компания, получившая награду Cradle to Cradle; дополнительное преимущество при получении LEED.',
        'uk' => '1 місце у рейтингу соціальної та екологічної  відповідальності Кремнієвої долини; єдина в світі сонячна компанія, що здобула відзнаку Cradle to Cradle; додаткова перевага при отриманні LEED.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'areas_warranty',
      'text' => [
        'ru' => 'Лучшая в области гарантия',
        'uk' => 'Найкраша в галузi гарантiя'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'manufacturer',
      'text' => [
        'ru' => '25 лет гарантии от производителя вам могут дать 5 брендов солнечных панелей. НО гарантию на производительность 92% эффективности через 25 лет дает лишь SUNPOWER и имеет только SUNPOWER MAXEON. Кроме того вся продукция компании SUNPOWER имеет прогнозируемый время работы более 40 лет.',
        'uk' => '25 років гарантії від виробника вам можуть дати 5 брендів сонячних панелей. АЛЕ гарантію на продуктивність 92% ефективності через 25 років дає лише SUNPOWER і має лише SUNPOWER MAXEON. Крім того вся продукція компанії SUNPOWER має прогнозований час роботи більше 40 років.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'world_record',
      'text' => [
        'ru' => 'Мировой рекорд эффективности',
        'uk' => 'Свiтовий рекорд з ефективностi'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'tallest',
      'text' => [
        'ru' => 'Самая высокая в мире эффективность при серийном производстве - до 22,8% КПД.',
        'uk' => 'Найвища в світі ефективність при серійному виробництві - до 22,8% ККД.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'reliability',
      'text' => [
        'ru' => 'Лучшая в мире надежность',
        'uk' => 'Краща в свiтi надiйнiсть'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'middle_modules',
      'text' => [
        'ru' => 'В 10 раз надежнее чем модули среднего класса. Модули устойчивы к колебанию температуры (день / ночь), штормового ветра, влаги, града и других факторов.',
        'uk' => 'В 10 разів надійніші ніж модулі середнього классу. Модулі стійкі до коливання температури (день/ніч), штормового вітру, вологи, граду та інших ушкоджень.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'degradation',
      'text' => [
        'ru' => 'Cамая маленькая в мире деградация',
        'uk' => 'Найменша в свiтi деградацiя'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'actual',
      'text' => [
        'ru' => 'Фактическая не более 0,2% в год, гарантированная не более 0,25% в год.',
        'uk' => 'Фактична не більше 0,2% в рік, гарантована не більше 0,25% в рік.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'coefficient',
      'text' => [
        'ru' => 'Лучший температурный коэфициент',
        'uk' => 'Найкращий температурний коефецiєнт'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => '0.29',
      'text' => [
        'ru' => '-0,29% в ° С для MAXEON 3 (X-series)',
        'uk' => '-0,29% на °С для MAXEON 3 (X-series)'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => '0.35',
      'text' => [
        'ru' => '-0.35% в ° С для MAXEON 2 (E-series)',
        'uk' => '-0.35% на °С для MAXEON 2 (E-series)'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'performance',
      'text' => [
        'ru' => 'Солнечная панель Performance',
        'uk' => 'Сонячна панель Performance'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'conventional_solar_panel',
      'text' => [
        'ru' => 'Обычная солнечная панель',
        'uk' => 'Звичайна сонячна панель'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'maxeon',
      'text' => [
        'ru' => 'Солнечная панель MAXEON',
        'uk' => 'Сонячна панель MAXEON'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'like_order',
      'text' => [
        'ru' => 'Желаете заказать расчет станции прямо сейчас?',
        'uk' => 'Бажаєте замовити розрахунок станції прямо зараз?'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'payment',
      'text' => [
        'ru' => 'расчет',
        'uk' => 'розрахунок'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'select_options',
      'text' => [
        'ru' => 'Выберите параметры мощности и нажмите кнопку «Заказать»',
        'uk' => 'Оберіть параметри потужності та натисніть кнопку «Замовити»'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'power',
      'text' => [
        'ru' => 'Мощность',
        'uk' => 'Потужність'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'more',
      'text' => [
        'ru' => 'Больше',
        'uk' => 'Бiльше'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'sun_power',
      'text' => [
        'ru' => 'Солнечная панель SUNPOWER',
        'uk' => 'Сонячна панель SUNPOWER'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'construction_2',
      'text' => [
        'ru' => 'Срок строительства',
        'uk' => 'Термін будівництва'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'month',
      'text' => [
        'ru' => 'Этот месяц',
        'uk' => 'Цей місяць'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'half_year',
      'text' => [
        'ru' => 'Через полгода',
        'uk' => 'Через пiв року'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'year',
      'text' => [
        'ru' => 'Через год',
        'uk' => 'Через рiк'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'rulers_sunpower',
      'text' => [
        'ru' => 'Существует две линейки модулей Sunpower',
        'uk' => 'Існує дві лінійки модулів Sunpower'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'invest',
      'text' => [
        'ru' => 'ИНВЕСТИРОВАТЬ В SUNPOWER',
        'uk' => 'ІНВЕСТУВАТИ В SUNPOWER'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'invest_2',
      'text' => [
        'ru' => 'инвестировать',
        'uk' => 'інвестувати'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunpower',
      'key' => 'download_catalog',
      'text' => [
        'ru' => 'скачать каталог',
        'uk' => 'скачати каталог'
      ],
    ]);

    /** Sunpower */

    /** Question Form */

    LanguageLine::updateOrCreate([
      'group' => 'question-form',
      'key' => 'question',
      'text' => [
        'ru' => 'Есть вопросы?',
        'uk' => 'Є питання?'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'question-form',
      'key' => 'your_name',
      'text' => [
        'ru' => 'Ваше имя',
        'uk' => "Ваше ім'я"
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'question-form',
      'key' => 'whole_field',
      'text' => [
        'ru' => 'Необходимо заполнить это поле',
        'uk' => 'Необхідно заповнити це поле'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'question-form',
      'key' => 'your_mail',
      'text' => [
        'ru' => 'Ваш e-mail',
        'uk' => 'Ваш e-mail'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'question-form',
      'key' => 'valid_email',
      'text' => [
        'ru' => 'Необходимо ввести правильный email',
        'uk' => 'Необхідно ввести правильний email'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'question-form',
      'key' => 'your_phone',
      'text' => [
        'ru' => 'Ваш телефон',
        'uk' => 'Ваш телефон'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'question-form',
      'key' => 'message_text',
      'text' => [
        'ru' => 'Текст сообщения',
        'uk' => 'Текст повідомлення'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'question-form',
      'key' => 'needed_your',
      'text' => [
        'ru' => 'Необходимо ваше согласие',
        'uk' => 'Необхідно вашу згоду'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'question-form',
      'key' => 'see',
      'text' => [
        'ru' => 'Я соглашаюсь с',
        'uk' => 'Я погоджуюся з'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'question-form',
      'key' => 'user_agreement',
      'text' => [
        'ru' => 'пользовательским соглашением',
        'uk' => 'призначеним для користувача угодою'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'question-form',
      'key' => 'and',
      'text' => [
        'ru' => 'и',
        'uk' => 'та'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'question-form',
      'key' => 'privacy_policy',
      'text' => [
        'ru' => 'политикой конфиденциальности',
        'uk' => 'політикою конфіденційності'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'question-form',
      'key' => 'send_message',
      'text' => [
        'ru' => 'Отправить',
        'uk' => 'Надіслати'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'question-form',
      'key' => 'thanks',
      'text' => [
        'ru' => 'Спасибо! В ближайшее время мы с Вами свяжемся.',
        'uk' => "Дякуємо! Найближчим часом ми з Вами зв'яжемося."
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'statistic-page',
      'key' => 'thanks',
      'text' => [
        'ru' => 'Спасибо!',
        'uk' => "Дякуємо!"
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'statistic-page',
      'key' => 'description',
      'text' => [
        'ru' => 'Мы получили вашу заявку, в ближайшее время наши специалисты свяжутся с вами!',
        'uk' => "Ми отримали вашу заявку, найближчим часом наші фахівці зв'яжуться з вами!"
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'question-form',
      'key' => 'number_panels',
      'text' => [
        'ru' => 'Количество панелей',
        'uk' => 'Кількість панелей'
      ],
    ]);

    /** Question Form */

    /** Question Form Partner */

    LanguageLine::updateOrCreate([
      'group' => 'question-partner-form',
      'key' => 'сompany_name',
      'text' => [
        'ru' => 'Название компании',
        'uk' => 'Назва компанії'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'question-partner-form',
      'key' => 'region',
      'text' => [
        'ru' => 'Регион',
        'uk' => 'Регіон'
      ],
    ]);

    /** Question Form Partner */
    LanguageLine::updateOrCreate([
      'group' => 'question-modal',
      'key' => 'region',
      'text' => [
        'ru' => 'Выберите область',
        'uk' => 'Виберіть область'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'region-modal',
      'key' => 'donetsk',
      'text' => [
        'ru' => 'Донецька',
        'uk' => 'Донецкая'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'region-modal',
      'key' => 'dnepr',
      'text' => [
        'ru' => 'Днепропетровская',
        'uk' => 'Дніпропетровська'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'region-modal',
      'key' => 'harkov',
      'text' => [
        'ru' => 'Харьковская',
        'uk' => 'Харківська'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'region-modal',
      'key' => 'lviv',
      'text' => [
        'ru' => 'Львовская',
        'uk' => 'Львівська'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'region-modal',
      'key' => 'odessa',
      'text' => [
        'ru' => 'Одесская',
        'uk' => 'Одеська'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'region-modal',
      'key' => 'lugansk',
      'text' => [
        'ru' => 'Луганская',
        'uk' => 'Луганська'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'region-modal',
      'key' => 'kiev',
      'text' => [
        'ru' => 'Киевская',
        'uk' => 'Київська'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'region-modal',
      'key' => 'zaporijya',
      'text' => [
        'ru' => 'Запорожская',
        'uk' => 'Запорізька'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'region-modal',
      'key' => 'vinnitca',
      'text' => [
        'ru' => 'Винницкая',
        'uk' => 'Вінницька'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'region-modal',
      'key' => 'poltava',
      'text' => [
        'ru' => 'Полтавская',
        'uk' => 'Полтавська'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'region-modal',
      'key' => 'frankovsk',
      'text' => [
        'ru' => 'Ивано-Франковская',
        'uk' => 'Івано-Франківська'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'region-modal',
      'key' => 'hmelnitsk',
      'text' => [
        'ru' => 'Хмельницкая',
        'uk' => 'Хмельницька'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'region-modal',
      'key' => 'zakarpatye',
      'text' => [
        'ru' => 'Закарпатская',
        'uk' => 'Закарпатська'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'region-modal',
      'key' => 'jitomir',
      'text' => [
        'ru' => 'Житомирская',
        'uk' => 'Житомирська'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'region-modal',
      'key' => 'cherkasskaya',
      'text' => [
        'ru' => 'Черкасская',
        'uk' => 'Черкаська'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'region-modal',
      'key' => 'rovny',
      'text' => [
        'ru' => 'Ровенская',
        'uk' => 'Рівненська'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'region-modal',
      'key' => 'nikolayev',
      'text' => [
        'ru' => 'Николаевская',
        'uk' => 'Миколаївська'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'region-modal',
      'key' => 'summy',
      'text' => [
        'ru' => 'Сумская',
        'uk' => 'Сумська'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'region-modal',
      'key' => 'ternopol',
      'text' => [
        'ru' => 'Тернопольская',
        'uk' => 'Тернопільська'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'region-modal',
      'key' => 'volinska',
      'text' => [
        'ru' => 'Волынская',
        'uk' => 'Волинська'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'region-modal',
      'key' => 'herson',
      'text' => [
        'ru' => 'Херсонская',
        'uk' => 'Херсонська'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'region-modal',
      'key' => 'chernigov',
      'text' => [
        'ru' => 'Черниговская',
        'uk' => 'Чернігівська'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'region-modal',
      'key' => 'kirovograd',
      'text' => [
        'ru' => 'Кировоградская',
        'uk' => 'Кіровоградська'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'region-modal',
      'key' => 'chernovetskaya',
      'text' => [
        'ru' => 'Черновицкая',
        'uk' => 'Чернівецька'
      ],
    ]);


    /** Reviews */

    LanguageLine::updateOrCreate([
      'group' => 'reviews',
      'key' => 'name',
      'text' => [
        'ru' => 'Отзывы',
        'uk' => 'Відгуки'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'reviews',
      'key' => 'about_us',
      'text' => [
        'ru' => 'Пишут о нас',
        'uk' => 'Пишуть про нас'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'reviews',
      'key' => 'watch_work',
      'text' => [
        'ru' => 'Смотреть работу',
        'uk' => 'Дивитися роботу'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'reviews',
      'key' => 'video',
      'text' => [
        'ru' => 'Видео отзывы',
        'uk' => 'Відео відгуки'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'reviews',
      'key' => 'messengers',
      'text' => [
        'ru' => 'Месенджеры',
        'uk' => 'Месенджери'
      ],
    ]);

    /** Reviews */

    /** Insurance */

    LanguageLine::updateOrCreate([
      'group' => 'insurance',
      'key' => 'we_insure',
      'text' => [
        'ru' => 'Мы страхуем',
        'uk' => 'Ми страхуємо'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'insurance',
      'key' => 'solar',
      'text' => [
        'ru' => 'солнечные',
        'uk' => 'сонячні'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'insurance',
      'key' => 'power_plants',
      'text' => [
        'ru' => 'электростанции',
        'uk' => 'електростанції'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'insurance',
      'key' => 'from',
      'text' => [
        'ru' => 'от',
        'uk' => 'від'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'insurance',
      'key' => 'policy_cost',
      'text' => [
        'ru' => 'Стоимость страхового полиса до 3% от стоимости оборудования,',
        'uk' => 'Вартість страхового поліса до 3% від вартості обладнання,'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'insurance',
      'key' => 'you_want',
      'text' => [
        'ru' => 'которое Вы хотите застраховать.',
        'uk' => 'яке Ви хочете застрахувати.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'insurance',
      'key' => 'insure',
      'text' => [
        'ru' => 'застраховать',
        'uk' => 'застрахувати'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'insurance',
      'key' => 'reliability',
      'text' => [
        'ru' => 'Надежность',
        'uk' => 'Надійність'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'insurance',
      'key' => 'best_protection',
      'text' => [
        'ru' => 'Страхование СЭС — лучшая охрана ваших инвестиций',
        'uk' => 'Страхування СЕС - найкраща охорона ваших інвестицій'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'insurance',
      'key' => 'disasters',
      'text' => [
        'ru' => 'В связи с участившимися случаями стихийных бедствий, среди которых: смерчи, пожары и град мы рекомендуем всем владельцам СЭС обязательно страховать свои солнечные электростанции.',
        'uk' => "У зв'язку з почастішанням випадків стихійних лих, серед яких: смерчі, пожежі і град ми рекомендуємо всім власникам СЕС обов'язково страхувати свої сонячні електростанції."
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'insurance',
      'key' => 'damage',
      'text' => [
        'ru' => 'Повреждение',
        'uk' => 'Пошкодження'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'insurance',
      'key' => 'refers',
      'text' => [
        'ru' => 'К страховым случаям относится:',
        'uk' => 'До страхових випадкiв вiдноситься:'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'insurance',
      'key' => 'insured_events',
      'text' => [
        'ru' => 'страховые случаи',
        'uk' => 'страховi випадки'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'insurance',
      'key' => 'property_damage',
      'text' => [
        'ru' => 'Повреждения имущества в результате стихийных явлений: (извержение вулкана, землетрясения, бури и урагана, смерча, урагана, селя, наводнения, обвала, оползня, просадки почвы, горного обвала, камнепада, лавины; града и других стихийных бедствий)',
        'uk' => 'Пошкодження майна в наслідок стихійних явищ: (виверження вулкану, землетрусу, бурі та урагану, смерчу, вихору, селю, повені, обвалу, зсуву, просадки ґрунту, гірського обвалу, каменепаду, лавини; граду та інших стихійних лих)'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'insurance',
      'key' => 'your_station',
      'text' => [
        'ru' => 'Также застрахуйте свою станцию от:',
        'uk' => 'Також застрахуйте свою станцiю вiд:'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'insurance',
      'key' => 'influence_fire',
      'text' => [
        'ru' => 'Безпосреднього воздействию огня',
        'uk' => 'Безпосреднього впливу вогню'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'insurance',
      'key' => 'lightning_strike',
      'text' => [
        'ru' => 'пожара, возгорания, удара молнии, замыкания электрических цепей в приборах и/или проводке, взрыва нефтепродуктов, машин, оборудования',
        'uk' => 'пожежі, займання, удару блискавки, замикання електричних ланцюгів в приладах і/або проводці, вибуху нафтопродуктів, машин, обладнання'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'insurance',
      'key' => 'bang',
      'text' => [
        'ru' => 'Взрыва',
        'uk' => 'Вибуху'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'insurance',
      'key' => 'process',
      'text' => [
        'ru' => 'стремительно проникающий процесс освобождения большого количества энергии в ограниченном объеме за короткий промежуток времени, сопровождается выделением большого количества тепла и образованием газов',
        'uk' => 'стрімко проникаючий процес визволення великої кількості енергії в обмеженому обсязі за короткий проміжок часу, що супроводжується виділенням великої кількості тепла та утворенням газів'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'insurance',
      'key' => 'fall',
      'text' => [
        'ru' => 'Падение любых предметов',
        'uk' => 'Падiння будь-яких предметiв'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'insurance',
      'key' => 'trees',
      'text' => [
        'ru' => 'деревьев, обломков деревьев, плодов с деревьев, радио, телевизионных и спутниковых антенн или их частей, рекламных щитов, др.',
        'uk' => 'дерев, уламків дерев, плодів з дерев, радіо, телевізійних та супутникових антен або їх частин, рекламних щитів, ін.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'insurance',
      'key' => 'weather',
      'text' => [
        'ru' => 'Погода может меняться, но из-за туч всегда получается Солнце.',
        'uk' => 'Погода може змінюватись, але з-за хмар завжди виходить Сонце.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'insurance',
      'key' => 'bad_weather',
      'text' => [
        'ru' => 'Не дайте непогоде залезть к вашему кошельку.',
        'uk' => 'Не дайте негоді залізти до вашого гаманця.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'insurance',
      'key' => 'protect',
      'text' => [
        'ru' => 'Защитите свои инвестиции с помощью компании',
        'uk' => 'Захистіть свої інвестиції за допомогою компанії'
      ],
    ]);

    /** Insurance */

    /** Insurance form */

    LanguageLine::updateOrCreate([
      'group' => 'insurance-form',
      'key' => 'your_name_surname',
      'text' => [
        'ru' => 'Ваше ФИО',
        'uk' => 'Ваше ПІБ'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'insurance-form',
      'key' => 'your_phone_number',
      'text' => [
        'ru' => 'Ваш телефон',
        'uk' => 'Ваш телефон'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'insurance-form',
      'key' => 'your_number_will_be_used',
      'text' => [
        'ru' => '(Ваш номер будет использован только для обработки данного заказа)',
        'uk' => '(Ваш номер буде використано тільки для обробки цього замовлення)'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'insurance-form',
      'key' => 'your_e-mail',
      'text' => [
        'ru' => 'Ваш e-mail',
        'uk' => 'Ваш e-mail'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'insurance-form',
      'key' => 'station_power',
      'text' => [
        'ru' => 'Мощность станции',
        'uk' => 'Потужність станції'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'insurance-form',
      'key' => 'locality',
      'text' => [
        'ru' => 'Населенный пункт',
        'uk' => 'Населений пункт'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'insurance-form',
      'key' => 'i_agree',
      'text' => [
        'ru' => 'Я соглашаюсь с',
        'uk' => 'Я погоджуюсь з'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'insurance-form',
      'key' => 'user_agreement',
      'text' => [
        'ru' => 'пользовательским соглашением',
        'uk' => 'угодою користувача'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'insurance-form',
      'key' => 'and',
      'text' => [
        'ru' => 'и',
        'uk' => 'та'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'insurance-form',
      'key' => 'privacy_policy',
      'text' => [
        'ru' => 'политикой конфиденциальности',
        'uk' => 'політикою конфіденційності'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'insurance-form',
      'key' => 'submit',
      'text' => [
        'ru' => 'отправить',
        'uk' => 'надіслати'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'insurance-form',
      'key' => 'whole_field',
      'text' => [
        'ru' => 'Необходимо заполнить это поле',
        'uk' => 'Необхідно заповнити це поле'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'insurance-form',
      'key' => 'valid_email',
      'text' => [
        'ru' => 'Необходимо ввести правильный email',
        'uk' => 'Необхідно ввести правильний email'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'insurance-form',
      'key' => 'needed_your',
      'text' => [
        'ru' => 'Необходимо ваше согласие',
        'uk' => 'Необхідно вашу згоду'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'insurance-form',
      'key' => 'insure',
      'text' => [
        'ru' => 'Застраховать',
        'uk' => 'Застрахувати'
      ],
    ]);

    /** Insurance form */

    /** Sunport */

    LanguageLine::updateOrCreate([
      'group' => 'sunport',
      'key' => 'solar_panels',
      'text' => [
        'ru' => 'Солнечные панели Sunport',
        'uk' => 'Сонячні панелі Sunport'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunport',
      'key' => 'unique',
      'text' => [
        'ru' => 'с уникальной технологией MWT',
        'uk' => 'з унікальною технологією MWT'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunport',
      'key' => 'guarantee',
      'text' => [
        'ru' => 'и 30-летней гарантией на генерацию',
        'uk' => 'і 30-річною гарантією на генерацію'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunport',
      'key' => 'world_market',
      'text' => [
        'ru' => 'производитель солнечных панелей, которые можно отнести к одним из самых прогрессивных на мировом рынке. Sunport отличается неповторимым дизайном и высоким коэффициентом полезного действия - 20.7%.',
        'uk' => 'виробник сонячних панелей, які можна віднести до одних з найбільш прогресивних на світовому ринку. Sunport відрізняється неповторним дизайном і високим коефіцієнтом корисної дії - 20.7%.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunport',
      'key' => 'calculation',
      'text' => [
        'ru' => 'Заказать расчет',
        'uk' => 'Замовити розрахунок'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunport',
      'key' => 'order',
      'text' => [
        'ru' => 'Заказать',
        'uk' => 'Замовити'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunport',
      'key' => 'details',
      'text' => [
        'ru' => 'Подробнее об MWT-технологии',
        'uk' => 'Детальніше про MWT-технології'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunport',
      'key' => 'technologies',
      'text' => [
        'ru' => 'MWT-технологии',
        'uk' => 'MWT-технології'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunport',
      'key' => 'advanced_technology',
      'text' => [
        'ru' => 'MWT — это передовая технология обратного контакта для повышения эффективности солнечных элементов за счет устранения шин на передней стороне и размещения, как положительных, так и отрицательных электродов на задней стороне.',
        'uk' => 'MWT - це передова технологія зворотного контакту для підвищення ефективності сонячних елементів за рахунок усунення шин на передній стороні і розміщення, як позитивних, так і негативних електродів на задній стороні.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunport',
      'key' => 'shading_area',
      'text' => [
        'ru' => 'Без бас-баров, площадь затемнения уменьшена на 3%',
        'uk' => 'Без бас-барів, площа затемнення зменшена на 3%'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunport',
      'key' => 'output_power',
      'text' => [
        'ru' => 'Выходная мощность модуля на 15 Вт выше средней по отрасли',
        'uk' => 'Вихідна потужність модуля на 15 Вт вище середньої по галузі'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunport',
      'key' => 'probability',
      'text' => [
        'ru' => 'Уменьшена вероятность возникновения микротрещин',
        'uk' => 'Зменшено ймовірність виникнення мікротріщин'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunport',
      'key' => 'compatibility',
      'text' => [
        'ru' => 'Совместимость с большинством типов ячеек, включая TOPCON, PERC, HIT и т.д.',
        'uk' => 'Сумісність з більшістю типів осередків, включаючи TOPCON, PERC, HIT і т.д.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunport',
      'key' => 'presentation',
      'text' => [
        'ru' => 'Презентация преимуществ технологии MWT в данном видео:',
        'uk' => 'Презентація переваг технології MWT в даному відео:'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunport',
      'key' => 'look',
      'text' => [
        'ru' => 'Смотреть видео',
        'uk' => 'Дивитися відео'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunport',
      'key' => 'comparison',
      'text' => [
        'ru' => 'Сравнение технологий',
        'uk' => 'Порівняння технологій'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunport',
      'key' => 'regular_module',
      'text' => [
        'ru' => 'По сравнению с обычным модулем модули MWT уменьшают затененную площадь на 3% без сборных шин. Модульная технология MWT заменяет струнную ленту проводящим задним листом, устраняя деформацию, микротрещины и приводит к снижению мощности, значительно улучшая стабильность и надежность.',
        'uk' => 'У порівнянні зі звичайним модулем модулі MWT зменшують затінену площа на 3% без збірних шин. Модульна технологія MWT замінює струнную стрічку проводять заднім листом, усуваючи деформацію, мікротріщини і призводить до зниження потужності, значно покращуючи стабільність і надійність.'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunport',
      'key' => 'structural_feature',
      'text' => [
        'ru' => 'Структурная особенность:',
        'uk' => 'Структурна особливість:'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunport',
      'key' => 'back_side',
      'text' => [
        'ru' => 'Положительный и отрицательный электроды находятся на задней стороне солнечного элемента',
        'uk' => 'Позитивний і негативний електроди знаходяться на задній стороні сонячного елементу'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunport',
      'key' => 'regular_cell',
      'text' => [
        'ru' => 'Обычная ячейка',
        'uk' => 'Звичайний осередок'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunport',
      'key' => 'negative_electrodes',
      'text' => [
        'ru' => 'Положительный и отрицательный электроды расположены по обе стороны от ячейки',
        'uk' => 'Позитивний і негативний електроди озташовані по обидва боки від осередку'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunport',
      'key' => 'cell_structure',
      'text' => [
        'ru' => 'Структура ячейки',
        'uk' => 'Структура осередку'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunport',
      'key' => 'higher',
      'text' => [
        'ru' => 'Конструкция без бас-баров обеспечивает более высокую выходную мощность за счет уменьшения площади затенения до 3%',
        'uk' => 'Конструкція без бас-барів забезпечує більш високу вихідну потужність за рахунок зменшення площі затінення до 3%'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunport',
      'key' => 'regular_cell2',
      'text' => [
        'ru' => 'Обычная ячейка',
        'uk' => 'Звичайний осередок'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunport',
      'key' => 'large_area',
      'text' => [
        'ru' => 'Традиционная конструкция покрывает большую площадь ячеек от основных шин, поэтому выходная мощность ограничена',
        'uk' => 'Традиційна конструкція покриває велику площу осередків від основних шин, тому вихідна потужність обмежена'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunport',
      'key' => 'encapsulation',
      'text' => [
        'ru' => 'Инкапсуляция модуля',
        'uk' => 'Iнкапсуляція модуля'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunport',
      'key' => 'cells_connect',
      'text' => [
        'ru' => 'Ячейки соединяются через проводящую фольгу без пайки, двухмерная герметичная конструкция снижает последовательное сопротивление и рабочую температуру модуля, обеспечивая более высокую надежность.',
        'uk' => "Осередки з'єднуються через провідну фольгу без пайки, двомірна герметична конструкція знижує послідовний опір і робочу температуру модуля, забезпечуючи більш високу надійність."
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunport',
      'key' => 'regular_cell3',
      'text' => [
        'ru' => 'Обычная ячейка',
        'uk' => 'Звичайний осередок'
      ],
    ]);

    LanguageLine::updateOrCreate([
      'group' => 'sunport',
      'key' => 'connected_ribbons',
      'text' => [
        'ru' => 'Ячейки, соединенные лентами струны, вызовут деформацию и микротрещины, что приведет к нестабильности и снижению мощности.',
        'uk' => "Осередки, з'єднані стрічками струни, викличуть деформацію і мікротріщини, що призведе до нестабільності і зниження потужності."
      ],
    ]);

    /** Sunport  */



		Artisan::call('cache:clear');
	}
}
