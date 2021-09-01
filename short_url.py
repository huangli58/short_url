def build_keyword(keyword='0'):
    try:
        # 适配数据库编码类型为 _bin 的字段
        keyword = keyword.decode()
    except:
        pass

    # 当前值
    keyword = str(keyword)

    # 定义最长为60位，左边补0
    keyword = keyword.rjust(60, '0')

    # 换位后，再转成数组
    idArrReverse = list(reversed(keyword))

    # 定义进制
    radix = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
    radixLen = len(radix)

    # 逐位加1
    for k, val in enumerate(idArrReverse):
        # 查找进制位置
        ind = radix.index(val)
        if ind < radixLen - 1:
            idArrReverse[k] = radix[ind + 1]
            break

        # 进位
        idArrReverse[k] = '0'

    # 返回拼接好的新字符串
    return ''.join(idArrReverse).rstrip('0')[::-1]