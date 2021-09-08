<template>
  <div>
    <sy-breadcrumb title="Authentication"></sy-breadcrumb>
    <div class="login-register-area pt-60 pb-65">
      <div class="container">
        <div class="row">
          <div class="col-lg-7 col-md-12 ms-auto me-auto">
            <div class="login-register-wrapper">
              <div class="login-register-tab-list nav">
                <a class="active" data-bs-toggle="tab" href="#lg1">
                  <h4>login</h4>
                </a>
                <a data-bs-toggle="tab" href="#lg2">
                  <h4>register</h4>
                </a>
              </div>
              <div class="tab-content">
                <div id="lg1" class="tab-pane active">
                  <div class="login-form-container">
                    <sy-login></sy-login>
                  </div>
                </div>
                <div id="lg2" class="tab-pane">
                  <div class="login-form-container">
                    <sy-register></sy-register>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import SyBreadcrumb from '../../components/commons/SyBreadcrumb';
import SyRegister from '../../components/auth/SyRegister';
import SyLogin from '../../components/auth/SyLogin';

export default {
  name: "Authentication",
  metaInfo: {
    title: "Authentication",
    titleTemplate: "%s - Faadaakaa Ecommerce",
  },
  components: {
    SyBreadcrumb,
    SyRegister,
    SyLogin
  }
}
</script>