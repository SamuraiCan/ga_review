<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReviewCreateMail extends Mailable
{
	use Queueable, SerializesModels;

	public function __construct($user_name, $game_title)
	{
		$this->user_name  = $user_name;
		$this->game_title = $game_title;
	}

	public function envelope()
	{
		return new Envelope(
			subject: '新しいレビュー投稿です',
		);
	}

	/**
	 * Get the message content definition.
	 *
	 * @return \Illuminate\Mail\Mailables\Content
	 */
	public function content()
	{
		return new Content(
			view: 'emails.review.create',
			with: [
				'user_name' => $this->user_name,
				'game_title' => $this->game_title,
			],
		);
	}

	/**
	 * Get the attachments for the message.
	 *
	 * @return array
	 */
	public function attachments()
	{
		return [];
	}
}
