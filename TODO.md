# TODO

## Feedback/Registration bug fixes
- [x] Update `php/registration.php` to prevent `Undefined index` by using `$_POST[...] ?? ''` and basic validation.
- [x] Update `js/feedback.js` to avoid crash when `#responseMsg` is missing (null-safe).
- [x] Update `html/contact.html` to include `<div id="responseMsg">...</div>` and ensure feedback textarea has `name="comments"`.
- [ ] Retest: submit registration + feedback; verify no 403 for registered users and no JS console errors.


