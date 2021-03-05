<?php
namespace Drupal\job_core\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Url;
use Drupal\webform\Entity\WebformSubmission;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Provides route responses for the Example module.
 */
class SubmissionController extends ControllerBase {

  /**
   * Returns a simple page.
   *
   * @param $sid
   *   Submission ID.
   *
   * @return \Symfony\Component\HttpFoundation\RedirectResponse
   * @throws \Drupal\Core\Entity\EntityStorageException
   */
  public function delete($sid) {
    $query = \Drupal::entityQuery('webform_submission')
      ->condition('webform_id', 'candidature')
      ->condition('sid', $sid)
      ->accessCheck(FALSE);

    $result = $query->execute();
    foreach ($result as $item) {
      $submission = WebformSubmission::load($item);
      $submission->delete();
    }

    return new RedirectResponse(Url::fromRoute('view.candidate_application_list.page_1')->toString(), 301);
  }

}
