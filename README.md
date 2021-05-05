## 1. 自訂指令

#### 1.1 Permission
重新安裝所有角色與權限，當data-presets檔內有修改權限的話可用這個指令重新安裝，會將原本有的重新對應權限給角色

    permission:reinstall
## 2. 後台活動紀錄

#### 1.1 使用時間
若是執行修正時，當model存入資料庫之前，就需要引用活動紀錄的function，才能抓到前後對比紀錄

    舉例:
    $user->fill($data);
    ActionLog::create_log($user);
    $user->save();

