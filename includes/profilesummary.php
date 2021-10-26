<div class="profile-summary">
  <div class="user">
    <span
      class="iconify avatar"
      data-icon="carbon:user-avatar-filled-alt"
      data-inline="false"
    ></span>
    <button class="camera-btn">
      <span
        class="iconify camera"
        data-icon="bx:bxs-camera"
        data-inline="false"
      ></span>
    </button>
    <p class="user-name"><?= $userProfile["firstName"] .
      " " .
      $userProfile["lastName"] ?></p>
  </div>
  <ul class="menu">
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