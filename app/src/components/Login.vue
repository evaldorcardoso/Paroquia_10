<template>
  <div class="container-fluid">
    <form action="" class="form">
      <div class="card card-login card hidden">
        <div class="card-header card-header-rose text-center">
          <h4 class="card-title">
            Entrar
          </h4>
        </div>
        <div class="card-body">
          <span class="bmd-form-group">
            <div class="input-group">
              <input id="entrar_email" type="email" email="true" class="form-control" placeholder="Email...">
            </div>
          </span>
          <span class="bmd-form-group">
            <div class="input-group">
              <input id="entrar_senha" type="password" class="form-control" placeholder="Senha...">
            </div>
          </span>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  name: 'Login'
}
</script>

<style>
  .card-header:first-child{
    border-radius: 3px;
    margin-top: -20px;
    padding: 15px;
  }
  .form-control{
    border: 0;
    height: 36px;
  }
  .form-control,
  .is-focused .form-control {
  background-image: linear-gradient(to top, #ec407a 2px, rgba(156, 39, 176, 0) 2px), linear-gradient(to top, #d2d2d2 1px, rgba(210, 210, 210, 0) 1px);
}
</style>
