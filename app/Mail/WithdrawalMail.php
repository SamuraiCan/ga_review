<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WithdrawalMail extends Mailable
{
	use Queueable, SerializesModels;

	public function __construct($user)
	{
		$this->user  = $user;
	}

	public function envelope()
	{
		return new Envelope(
			subject: '退会者が出ました！',
		);
	}

	public function content()
	{
		return new Content(
			view: 'emails.withdrawal.index',
			with: [
				'user_id' => $this->user->id,
				'user_name' => $this->user->name,
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
