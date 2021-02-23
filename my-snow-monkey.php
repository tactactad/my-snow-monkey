<?php
/**
 * Plugin name: My Snow Monkey
 * Description: このプラグインに、あなたの Snow Monkey 用カスタマイズコードを書いてください。
 * Version: 0.2.0
 *
 * @package my-snow-monkey
 * @author inc2734
 * @license GPL-2.0+
 */

 /**
 * @param $html テンプレートパーツの出力HTML
 * @param $slug テンプレートパーツのslug
 * @param $name テンプレートパーツの名前
 * @param $vars テンプレートパーツのリクエスト配列
 */
add_filter(
	'snow_monkey_template_part_render',
	function( $html, $slug, $name, $vars ) {
		if ( 'template-parts/content/related-posts' === $slug) {
			$html = str_replace(
				'関連記事',
				'かんれんするかも',
				$html
			);
			return $html;
		}

		if ('template-parts/discussion/comments' === $slug) {
			$html = str_replace(
				['この投稿へのコメント', 'コメントはありません。', 'コメントを残す', 'コメントを送信'],
				['こめんと', 'こめんとはないよ。だれかしてよ。', 'こめんと', 'そうしん'],
				$html
			);
			return $html;
		}

		if ('template-parts/content/prev-next-nav' === $slug) {
			$html = str_replace(
				['古い投稿', '新しい投稿'],
				['ふるいの', 'あたらしいの'],
				$html
			);
			return $html;
		}

		if ('template-parts/discussion/comment-form' === $slug) {
		    $html = str_replace(
		        ['メールアドレスが公開されることはありません', '名前', 'メール', 'サイト'],
		        ['めーるあどれすはこうかいされないよ', 'おなまえ', 'めーる', 'さいと'],
		        $html
		    );
		    return $html;
		}

		if ('template-parts/discussion/comment.php' === $slug) {
			$html = str_replace(
				['あなたのコメントは承認待ちです。', 'コメントを編集'],
				['しょうにんまちだよ。', 'へんしゅう'],
				$html
			);
			return $html;
		}

		$html = str_replace(
			'この記事を書いた人',
			'かいているひと',
			$html
		);
		return $html;
	},
	10,
	4
);

/**
 * @param array $items パンくずの配列
 * @return array パンくずの配列
 */
add_filter(
	'snow_monkey_breadcrumbs',
	function( $items ) {
		$items[0]['title']  = 'ほーむ';
		return $items;
	}
);

/**
 * Snow Monkey 以外のテーマを利用している場合は有効化してもカスタマイズが反映されないようにする
 */
$theme = wp_get_theme( get_template() );
if ( 'snow-monkey' !== $theme->template && 'snow-monkey/resources' !== $theme->template ) {
	return;
}

/**
 * Directory url of this plugin
 *
 * @var string
 */
define( 'MY_SNOW_MONKEY_URL', untrailingslashit( plugin_dir_url( __FILE__ ) ) );

/**
 * Directory path of this plugin
 *
 * @var string
 */
define( 'MY_SNOW_MONKEY_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) );
