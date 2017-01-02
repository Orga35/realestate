<?php

namespace Drupal\acreat_realestate\Controller {

    use Drupal\Core\Controller\ControllerBase;
    use Drupal\Core\Breadcrumb\Breadcrumb;
    use Drupal\Core\Breadcrumb\BreadcrumbBuilderInterface;
    use Drupal\Core\Routing\RouteMatchInterface;
    use Drupal\Core\Link;
    use Drupal\Core\Url;


    /**
     * Provides default breadcrumb for "real estate" content type
     */
    class BreadcrumbBuild extends ControllerBase implements BreadcrumbBuilderInterface {

        /**
        * {@inheritdoc}
        */
        public function applies(RouteMatchInterface $attributes) {
            $parameters = $attributes->getParameters()->all();
            if (!empty($parameters['node'])) {
                return ($parameters['node']->getType() == 'realestate');
            }
            return false;
        }

        /**
        * {@inheritdoc}
        */
        public function build(RouteMatchInterface $route_match) {
            $breadcrumb = new Breadcrumb();
            $breadcrumb->addLink(Link::createFromRoute($this->t('Home'), '<front>'));
            return $breadcrumb;
        }

    }
}
