<?php
session_start();
$isLoggedIn = isset($_SESSION['auth']);
?>

<?php if ($isLoggedIn): ?>
  <form id="feedbackForm">
    <div class="mb-3">
      <label for="feedback" class="form-label">Write your feedback</label>
      <textarea class="form-control" name="feedback" rows="4" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit Feedback</button>
  </form>
  <div id="responseMsg" class="mt-3 text-success"></div>
<?php else: ?>
  <p class="text-danger">Please <a href="login.html">login</a> to submit your feedback.</p>
<?php endif; ?>
