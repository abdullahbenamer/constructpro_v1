document.addEventListener('DOMContentLoaded', function () {

    /*
     * ConstructPro global HTML5 validation messages.
     *
     * The translations are provided by PHP through
     * window.CONSTRUCTPRO_VALIDATION_MESSAGES
     */

    const messages = window.CONSTRUCTPRO_VALIDATION_MESSAGES || {};

    /*
     * Apply translated validation message.
     */
    function setValidationMessage(input) {

        if (!input || !input.validity) {
            return;
        }

        const validity = input.validity;

        /*
         * Do not replace messages for valid fields.
         */
        if (validity.valid) {
            input.setCustomValidity('');
            return;
        }

        let message = '';

        if (validity.valueMissing) {

            message = messages.required || '';

        } else if (validity.typeMismatch) {

            if (input.type === 'email') {
                message = messages.email || '';
            } else if (input.type === 'url') {
                message = messages.url || '';
            } else {
                message = messages.invalid || '';
            }

        } else if (validity.rangeOverflow) {

            message = (messages.max || '').replace(
                ':max',
                input.max
            );

        } else if (validity.rangeUnderflow) {

            message = (messages.min || '').replace(
                ':min',
                input.min
            );

        } else if (validity.tooLong) {

            message = (messages.maxlength || '').replace(
                ':maxlength',
                input.maxLength
            );

        } else if (validity.tooShort) {

            message = (messages.minlength || '').replace(
                ':minlength',
                input.minLength
            );

        } else if (validity.stepMismatch) {

            message = (messages.step || '').replace(
                ':step',
                input.step
            );

        } else if (validity.patternMismatch) {

            message = messages.pattern || '';

        } else if (validity.badInput) {

            message = messages.invalid || '';

        } else {

            message = messages.invalid || '';
        }

        /*
         * If a translation exists, use it.
         * Otherwise allow the browser's normal message.
         */
        input.setCustomValidity(message);
    }


    /*
     * Catch HTML5 validation before the browser displays
     * its native validation message.
     *
     * "invalid" does not normally bubble, therefore
     * capture = true is required.
     */
    document.addEventListener(
        'invalid',
        function (event) {
            setValidationMessage(event.target);
        },
        true
    );


    /*
     * Clear the custom message while the user is correcting
     * the field.
     */
    document.addEventListener(
        'input',
        function (event) {

            const input = event.target;

            if (
                input &&
                input.matches &&
                input.matches(
                    'input, textarea, select'
                )
            ) {
                input.setCustomValidity('');
            }
        },
        true
    );


    /*
     * Re-apply the translated message before form submission.
     *
     * This is useful for browsers that perform validation
     * slightly differently depending on the input type.
     */
    document.addEventListener(
        'submit',
        function (event) {

            const form = event.target;

            if (!form || !form.checkValidity) {
                return;
            }

            const fields = form.querySelectorAll(
                'input, textarea, select'
            );

            fields.forEach(function (input) {

                if (!input.validity.valid) {
                    setValidationMessage(input);
                }

            });

        },
        true
    );

});