<?php

/**
 * Nextcloud - FaxApp
 */
namespace OCA\FaxApp\Constants;


abstract class FaxAppConstants {

    /**
     * Twilio Account Sid
     *
     * @var string
     */
    const STATUS_PENDING = 'pending';

    /**
     * The pending status. This fax is waiting to be sent to the fax service.
     *
     * @var string
     */
    const STATUS_PENDING = 'pending';

    /**
     * The fax is queued, waiting for processing.
     * This status is returned from Twilio.
     *
     * @var string
     */
    const STATUS_QUEUED = 'queued';

    /**
     * The fax is being downloaded, uploaded, or transcoded into a different format.
     * This status is returned from Twilio.
     *
     * @var string
     */
    const STATUS_PROCESSING = 'processing';

    /**
     * The fax is in the process of being sent.
     * This status is returned from Twilio.
     *
     * @var string
     */
    const STATUS_SENDING = 'sending';

    /**
     * The fax has been successfuly delivered.
     * This status is returned from Twilio.
     *
     * @var string
     */
    const STATUS_DELIVERED = 'delivered';

    /**
     * The outbound fax failed because the other end did not pick up.
     * This status is returned from Twilio.
     *
     * @var string
     */
    const STATUS_NO_ANSWER = 'no-answer';

    /**
     * The outbound fax failed because the other side sent back a busy signal.
     * This status is returned from Twilio.
     *
     * @var string
     */
    const STATUS_BUSY = 'busy';

    /**
     * The fax failed to send or receive.
     * This status is returned from Twilio.
     *
     * @var string
     */
    const STATUS_FAILED = 'failed';

    /**
     * The fax was canceled, either by using the REST API, or rejected by TwiML.
     * This status is returned from Twilio.
     *
     * @var string
     */
    const STATUS_CANCELED = 'canceled';



    /**
     * Supported MIME types for OCR processing.
     *
     * @var array
     */
    const ALLOWED_MIME_TYPES = [
            'application/pdf',
            'image/png',
            'image/jpeg',
            'image/tiff',
            'image/jp2',
            'image/jpm',
            'image/jpx',
            'image/webp',
            'image/gif'
    ];

    /**
     * The correct MIME type for a PDF file.
     *
     * @var string
     */
    const MIME_TYPE_PDF = 'application/pdf';
