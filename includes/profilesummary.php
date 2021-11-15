<div data-sal="slide-right" data-sal-duration="1200" data-sal-delay="200" data-sal-easing="ease-out-bounce" class="profile-summary">
  <div class="user">
    <?php if ($userProfile) { ?>
      <?php if (
        is_null($userProfile["profileImg"]) ||
        empty($userProfile["profileImg"])
      ) { ?>
        <img alt="Profile image" class="avatar">
      <?php } else { ?>
        <img src="./assets/img/<?= $userProfile[
          "profileImg"
        ] ?>" alt="Profile image" class="avatar-img">
      <?php } ?>
        <input type="hidden" id="initials" value="<?= strtoupper(
  mb_substr($userProfile["firstName"], 0, 1)
),
          strtoupper(mb_substr($userProfile["lastName"], 0, 1)) ?>">
    <?php } ?>
    <?php if ($title === "Profile") { ?>
      <label class="btn outline-primary-btn change-img" for="avatarImg">
        Change Profile Image
      </label>
    <?php } ?>
    <p class="user-name"><?= $userProfile["firstName"] .
      " " .
      $userProfile["lastName"] ?></p>
  </div>
  <div class="account-menu">
    <div class="burger-menu">
      <div class="line1"></div>
      <div class="line2"></div>
      <div class="line3"></div>
    </div>
    Account Menu
  </div>
  <ul class="user-menu">
    <li>
      <a href="profile.php?ID=<?= $user["ID"] ?>" class="<?= $title ===
"Profile"
  ? "visited"
  : "" ?>"
        ><span
          class="iconify <?= $title === "Profile" ? "visited" : "" ?>"
          data-icon="fa-solid:user"
          data-inline="false"
        ></span
        >Profile</a
      >
    </li>
    <li>
      <a href="addresses.php?ID=<?= $user["ID"] ?>" class="<?= $title ===
"Addresses"
  ? "visited"
  : "" ?>">
        <span
          class="iconify <?= $title === "Addresses" ? "visited" : "" ?>"
          data-icon="ant-design:home-filled"
          data-inline="false"
        ></span
        >Addresses</a
      >
    </li>
    <li>
      <a href="order.php?ID=<?= $user["ID"] ?>" class="<?= $title === "Orders"
  ? "visited"
  : "" ?>"
        ><span
          class="iconify <?= $title === "Orders" ? "visited" : "" ?>"
          data-icon="fa-solid:shopping-bag"
          data-inline="false"
        ></span
        >Orders</a
      >
    </li>
    <li>
      <a href="returnorder.php?ID=<?= $user["ID"] ?>" class="<?= $title ===
"Return Order"
  ? "visited"
  : "" ?>"
        ><span class="iconify <?= $title === "Return Order"
          ? "visited"
          : "" ?>" data-icon="ic:baseline-assignment-return"></span>
        Return</a
      >
    </li>
    <li>
      <a href="logout.php"
        ><span
          class="iconify"
          data-icon="ls:logout"
          data-inline="false"
        ></span
        >Logout</a
      >
    </li>
  </ul>
</div>